<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="IE-edge">
        <meta name = "viewport" content="width=device-width, initial-scale=1.0">
        <title> @yield('title') </title>
        <style>
            .heading-design {
                text-align: center;
            }
            .instructor-design{
                margin-top: -15px;
            }
             .center-table {
                 margin: 0 auto;
             }

            .center-table table {
                border-collapse: collapse;
                width: 80%;
                margin: 0 auto;
            }

            .center-table th, .center-table td {
                border: 1px solid red;
                padding: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="heading-design">
            <h3> Basic Laravel Course </h3>
            <div class="instructor-design">
                <h3>
                    List of Blogs
                </h3>
            </div>
            <div>
                <h3> @yield('content') </h3>
            </div>
            <div class="center-table">
                @yield('dataWithoutTable')
                <table >
                    <tr>
                        @yield('tableData')
                    </tr>
                </table>
            </div>
        </div>

    </body>

</html>
