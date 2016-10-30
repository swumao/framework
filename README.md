# 基础框架

## 需求

- php >= 7.0.0
- php-yaf = 3.0.4
- nginx = 1.10.2

## 配置

### php.ini 

```
extension=yaf.so

;;;;;;;;;;;;;;;;;;;
; Module Settings ;
;;;;;;;;;;;;;;;;;;;

[Yaf]
yaf.environ=develop
; default is product, maybe test preline develop product
yaf.name_suffix=1
yaf.use_namespace=1
yaf.use_spl_autoload=1

```

### nginx.conf

```
    server {
        listen       80;
        server_name  framework.local;

        access_log  logs/host.access.framework.log  main;

        #error_page  404              /404.html;

        # redirect server error pages to the static page /50x.html
        #
        error_page   500 502 503 504  /50x.html;
        location = /50x.html {
            root   html;
        }

        rewrite ^/(.*) /index.php/$1 last;

        # proxy the PHP scripts to Apache listening on 127.0.0.1:80
        #
        #location ~ \.php$ {
        #    proxy_pass   http://127.0.0.1;
        #}
        # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
        #
        location ~ .*$ {
            root           /var/www/html/framework/public;
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_index  index.php;
            fastcgi_param  SCRIPT_FILENAME  /$document_root$fastcgi_script_name;
            include        fastcgi_params;
        }
    }             
```