<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Download pdf -- barcode details</title>

</head>

<body>



<div>

<table>
    @for($i = 0;$i <$print_quantity; $i++)

    <tr>


        <td>
            <br>
            <img src="data:image/png;base64,' . {{DNS1D::getBarcodePNG($id, 'C128',2,40,array(1,1,1), true)}} . '" alt="barcode"   />
            <br>


            <span>........................</span>
        </td>

        </tr>






    @endfor



</table>







</div>

</body>
</html>




