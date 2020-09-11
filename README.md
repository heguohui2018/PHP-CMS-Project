目录结构

-   htaccess：重写 url,放在根目录下

    因为 Apache 服务器默认是没有打开 mod_rewrite 模块的，所以我们必须手动来启动。打开 Apache 的配置文件 httpd.conf 文件，找到下面一行：

    `#LoadModule rewrite_module modules/mod_rewrite.so`

    把前面的注释符 ‘#’ 去掉

-   includes 文件夹

    --- db.php 数据库配置文件
    -- header.php 页面的 head 标签内容
    -- footer.php 页面的版权信息部分
