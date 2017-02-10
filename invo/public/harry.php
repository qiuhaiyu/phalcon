<script src="js/jquery.min.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    //注册页面加载完成回调函数（匿名）
    $(document).ready(function(){
//使用ajax方法调用跨域脚本；
        $.ajax({
            url:"http://money.finance.sina.com.cn/mac/api/jsonp.php",
            dataType: 'jsonp',
            success: function(data){
                $(document.body).append("<hr />ajax ok!" + data.config);
            }
        });
    });


</script>