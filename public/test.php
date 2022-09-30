<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            /* section
            {
                display: flex;
                flex-direction: row;
                justify-content: space-evenly;
                align-items: center;
            } */

            section
            {
                display: grid;
                grid-template-columns: 1fr 2fr 9fr;
            }

            .div1
            {
                background: red;
            }

            .div2
            {
                background: green;
            }

            .div3
            {
                background: blue;
            }


        </style>
    </head>
    <body>
        <section>
            <div class="div1">Div 1</div>
            <div class="div2">Div 2</div>
            <div class="div3">Div 3</div>
        </section>
    </body>
</html>