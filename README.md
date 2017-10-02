# MVC sample  #
Simple MVC for my own use. This application is inspired by [https://github.com/panique/mini3](https://github.com/panique/mini3 "mini3").
Eveything has been rewriten.   
My goals are :

- understand everything (easy to maintain)
- clean structure file (mvc is ideal : nothing in root, evrything in dir)
- have a strucure in order to developp and to deploy number of applications.

Examples url : ROOT = HomePage -- ROOT/your-text/f-v-45 = functionnal id 45 -- 

## The core : ##
- root/index.php (bootsrap file : not in root/application)
- root/.htaccess (rewrite rule in apache, from mini3)
- root/autoloader.php (load class with namespace, from php ressource)
- root/config/config.php (all params : routing...)
- root/**Controller**/Controller.php (used in index.php to redirect to convenient page)
- root/Controller/Error.php (redirect to error page)
- root/**Model**/Url.php (transform wanted url)
- root/Model/+Functional.php (functionnal model example)
- root/**View**/error.mustache,index.mustache,+functional.mustache (for error page,index page and other functional pages)
- root/View/partial/\_footer.mustache,_header.mustache (for error page and other)

## External : ##
- root/composer.json (in order to use a template framework "mustache")
- root/vendor (composer dir and mustache dir)

## Caution : ##
This is just for example. 

- To adapt for SEO (see index.php fist comment). 
- Add control error with regex in controller (see Model/Url.php line 44  
 and adapt with rest servers : [https://github.com/phpdudimanche/rest/blob/master/src/Controller/Issues.php](https://github.com/phpdudimanche/rest/blob/master/src/Controller/Issues.php "rest") and [https://github.com/phpdudimanche/slim-rest/blob/master/index.php](https://github.com/phpdudimanche/slim-rest/blob/master/index.php "slim-rest")).