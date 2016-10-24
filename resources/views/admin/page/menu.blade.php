<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
        * {
            margin: 0;
            padding: 0
        }

        li {
            list-style: none
        }

        #menu_wrapper {
            width: 500px;
            margin: 0px auto;
            margin-top: 100px;
            border: solid 1px gray;
            padding: 50px;
        }

        .button {
            padding: 5px 10px;
            color: white;
            background: blue;
            border: none;
            cursor: pointer
        }

        #menu_wrapper ul ul {
            margin-left: 20px;
        }

        #menu_wrapper ul li {
            margin-top: 10px;
        }

        #menu_wrapper ul li a {
            height: 30px;
            color: blue;
            font-weight: bold;
            display: block;
            line-height: 30px;
            border: solid 1px gray;
            background: #FAFAFA;
            text-decoration: none;
            padding-left: 10px;
        }

        #menu_wrapper ul li div {
            border: solid 1px gray;
            border-top: 0px;
            background: #FAFAFA;
            display: none
        }

        #menu_wrapper ul li div tr td {
            padding: 10px 20px;
        }

        input, select {
            border: solid 1px gray;
            padding: 5px 10px;
        }
    </style>

    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>

    <script language="javascript">
        $(document).ready(function () {
            $('#menu_wrapper ul div').hide();
            $('#menu_wrapper ul li a').click(function () {
                var tmp = $(this).next('div');

                if ($(tmp).is(':visible')) {
                    $(tmp).hide();
                }
                else {
                    $(tmp).show();
                }
                return false;
            });
        });
    </script>
</head>
<body>
<div id="menu_wrapper">
    <input type="button" class="button" value="Thêm"/> <br/> <br/>
    <hr/>
    <br/>
    @if(isset($menu))
       <?php showMenu($menu,$options); ?>
    @endif
</div>
</body>
</html>