# About messageboard


 ### 这里运用了laravel框架、Ajax、bootstrap、MySQL实现了留言分页功能
 
 首先你需要在.env文件里设置`DB_DATABASE`,`DB_USERNAME`和`DB_PASSWORD`等属性，默认连接MySQL数据库,然后你需要在`DB_DATABASE`设置的数据库里新建一个`messages`的数据表，加上`user_id(integer)`,`username(string)`和`body`字段（默认的id和timestamp字段不变动）.要想登陆进去时，首先要在你创建的数据库里的`user`数据表添加用户，记得`password`字段要用到bcrypt()函数，最好直接在tinker里进行。

 登陆进去后，你就可以看到你的用户名出现在navbar上，可以通过下拉菜单的logout退出登陆。
  
  点击按钮Add Message来添加留言。
  
  点击按钮Show Message来查看留言
  
  每一页只能看五条留言，如果想改变的话将`MessageController.php`中所有的`$pagepernum`变量改为你想要的每页显示的留言数即可，
  
  另外一点，滚动下一页查看时不加载整个界面，因为采用了`ajax`技术，但是后来觉得没必要，因为速度差不多，但是为了效果，还要添加多余的js代码来对html元素进行更改。
