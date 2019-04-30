1. Requirements
---------------
  * PHP 5.5 or later.
  * Apache server. Other servers can be used, but then the redirect rules in the .htaccess file must be written for the used server instead.

2. Installation
---------------
To install the framework, just unzip it in the web application's root directory. This will create (among other things) an index.php file and a .htaccess file. These must be present in the web application's root directory, which means you can not create your own index file.

The .htacces file specifies rules that redirect all http requests to the framework, except for requests with a url matching an existing file or directory, or a url with a path ending with one of the following extensions: bmp, cgi, css, flv, gif, ico, jpeg, jpg, js, png, html, php, swf or xml. This will work only if redirecting is on in Apache. To switch it on, follow the steps below.

2.1 Enabling redirect rules in OSX with the included Apache server
------------------------------------------------------------------
Step 1, allow redirecting DONE
In the apache config file (/etc/apache2/httpd.conf), there must be a Directory entry similar to the one below. Redirecting is enabled by the third line, "AllowOverride All".
   <Directory />
     Options FollowSymLinks
     AllowOverride All
   </Directory>

Step 2, Load the Apache redirect module
Add the line below to the apache config file (/etc/apache2/httpd.conf)
   LoadModule rewrite_module libexec/apache2/mod_rewrite.so

2.2 Enabling redirect rules in Windows with Uniform Server
----------------------------------------------------------
This is already done, no extra configuration is required.

3. User Guide
-------------
The framework handles class loading, routing, http parameters, views, sessions and error handling.

3.1 Class Loading
-----------------
Place all your classes under the 'classes' directory that is created when the framework is installed. Use a directory structure matching the namespaces and name each file after the class in the file. For example, the class MyClass in the namespace MyApp\Model shall be in the file classes/MyApp/Model/MyClass.php. You do not have to 'include' or 'require' any classes, they are loaded by the framework. Class names must obey the following rules, fully qualified class name means class name prefixed by namespace name.
    1. The fully qualified class name is a string.
    3. The fully qualified class name contains only alphanumeric characters and '_'. 
    4. The character '\' separates namespace elements from each other and from the class name.
    4. Neither namespace elements, nor class name is empty. This means that multiple '\' characters are separated by at least one alphanumeric character.
    5. The fully qualified class name does not start with the character '\'.

3.2 Routing
-----------
To create a class that handles a http request, write a class that extends \Id1354fw\View\AbstractRequestHandler. This class shall have the method 'protected function doExecute()', which performs all work needed to handle the http request. If this class is called \MyApp\View\Something and placed in the file classes/MyApp/View/Something.php, then the doExecute method is called when the user requests the url http://<yourserver>/<yourwebapp>/Myapp/View/Something. 

If there is no matching class, or if the url is http://<yourserver>/<yourwebapp>/index.php, the framework will call the 'doExecute' method in the class 'DefaultRequestHandler' in any namespace, which means it shall be in the file classes/*/DefaultRequestHandler.php. The asterix means any number of directories with any name. The framework will just look for a file called DefaultRequestHandler.php in any subdirectory to the classes directory. If there are multiple such files, any one of them might be used. If there is no such file, the http response will be a 404 error. 

A url ending with a file extension, e.g. '.php' or '.html', is not passed to the framework, it is managed by the server as if there was no framework. The only exception to this rule is a request for index.php in the webapp root, which is handled as specified above.

3.3 Http Parameters
-------------------
The http request handling class (extending \Id1354fw\View\AbstractRequestHandler) must have a set method for each http post and get parameter. If the parameter is called 'someParam', the set method must be 'public function setSomeParam($parameterValue)'. This function will be called with the value of the http parameter before the doExecute method is called. An internal server error (http status code 500) is generated if there is not a setter
for each http parameter.

3.4 Views
---------
To make data available in the next view, call the method 'addVariable($name, $value)' in the 'doExecute' method. The parameter '$value' is the data that shall be available in the next view and '$name' is the name of the variable containing that data. If, for example, '$name' has the value "greeting" and '$value', has the value "hi there", then the statement 'echo $greeting' in the view file will output "hi there". The call to addVariable generates an internal server error (http status code 500) if the parameter name is anything but a string with length one or more.

The 'doExecute' method shall return the path to the file with the next view. 'views/' is prepended to the returned path and '.php' is appended to the path. If, for example, the string 'dir1/next-view' is returned, the view file shall be 'views/dir1/next-view.php'. The response is a http status code 404 message if the specified view is not found. No http response at all is generated if the value returned by 'doExecute' is anything but a string with length one or more, nor if no value at all is returned.

3.5 Sessions
------------
There is no need to call session_start() or any other method just to resume the current session, that is done by the framework on each request. The request handler contains the object $this->session, which has the following methods.

restart() 
Starts a new session if there is none. Changes session id if there is already a session. Returns the id of the current session, after regeneration if the session id is regenerated.

invalidate()
Stops the session, discards all session data, unsets the session id and destroys the session cookie. Throws \LogicException if there is no current session.

set($key, $value)
Stores the specified value under the specified key in the session. If there is already a value with the specified key, it is replaced with the value specified in this method call. Throws \LogicException if there is no current session. Throws \InvalidArgumentException if $key is not a string with at least one character.

get($key)
Returns the value associated with the specified key, or NULL if there is no key-value pair with the specified key. Throws \LogicException if there is no current session. Throws \InvalidArgumentException if $key is not a string with at least one character.

3.6 Error Handling
------------------
1. If a request handler throws \Exception or any of its subclasses, the framework will generate an internal server error (http code 500) response.

2. The framework sets an error handler for PHP Notice, which does nothing to avoid filling the server logs with messages generated when the session manager checks for a session cookie and there is none.
