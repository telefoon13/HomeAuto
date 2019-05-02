<html>
<head>
    <script src="http://code.jquery.com/jquery-latest.js">
        <script type="text/javascript">
            setInterval("my_function();",5000);
        function my_function(){
            $('#time').load(location.href + ' #time');
        }
    </script>
</head>
<body>
<div id="time">
    <?php echo date('H:i:s');?>
</div>
</body>
</html>