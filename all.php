        <!-- php for top html - inc_header.php  -->
        <?php
            $page_id = 5;
            include "inc_header.php" ;
        ?>

        <title> show all contact</title>
        <style>
            /* css code  */

            /* main section */
            ul{
                list-style: none;
                display: table;
                width: 100%;
                margin: 0;
                padding: 0;
            }
            li{
                display: table-cell;
                padding: 5px .5%;
                width: 11%;
                border-right: 1px solid #ccc;
                font-family: 'Open Sans', sans-serif;
                overflow: hidden;
            }
            #row{
                background: #444;
                color: #fff;
            }
            .male, .view, .edit, .delete, .female{
                width: 20px;
                height: 20px;
                background-size: cover;
                display: inline-block;
                margin: 0 2px;
            }
            .male{
                background-image: url(icons/male.svg);
            }
            .female{
                background-image: url(icons/female.svg);
            }
            .view{
                background-image: url(icons/view.svg);
                background-size: contain;
                background-repeat: no-repeat;
            }
            .edit{
                background-image: url(icons/edit.svg);
            }
            .delete{
                background-image: url(icons/delete.svg);
            }
            .col1{
                width: 3%;
            }
            .col2{
                width: 23%;
            }
            .col3{
                border-right: 0;
                text-align: center;
            }
            .row2{
                background: #eee;
            }

            .pg{
                background: #f3b910;
                color: #000;
                box-shadow: 0 0 3px #000;
            }
            .pg:hover{
                background: #F27609;
            }
            .dots, .pg, .current{
                padding: 5px;
                text-decoration: none;
                margin: 5px;
                float: left;
                font-size: 1em;
            }
            .current{
                background: #333;
                color: #fff;
                box-shadow:  0 0 3px #000;
            }
            #pagination{
                margin-top: 20px;
            }
            form{
                margin-bottom: 20px;
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                border-bottom: 3px solid #444;
                padding-bottom: 10px;
            }
            .in1{
                width: 300px;
                background: #ebe5e5;
                padding: 5px;
                border: 1px solid #ccc;
                font-family: 'Open Sans', sans-serif;
            }
            .in2{
                background: #f38918;
                color: #000;
                width: 120px;
                margin: 0 5px;
                padding: 5px 0;
                border: 0;
                box-shadow: 0 0 3px #000;
                font-family: 'Open Sans', sans-serif;
                font-size: 1.1em;
            }
            .gender{
                background: #ebe5e5;
                padding: 8px;
                float: left;
                margin: 0 2px;
            }
            .in2:hover{
                background: #f27609;
                
            }
            select{
                font-family: 'Open Sans', sans-serif;
                font-size: 1.1em;
                padding: 2px 0;
            }

            /* media queries*/

            @media screen and (max-width:1220px) {
                /* for menus  */
                #menu{
                    width: 100%;
                }
                .menu{
                    float: left;
                    border-bottom: 0;
                    border-right: 1px dashed #f3b918;
                    margin: 10px 0;
                    padding: 0;
                    width: 19%;
                    text-align: center;
                }
                .menu:last-child{
                    border-right: 0;
                }
                /* serch form */
                .item{
                    width: 30%;
                    margin-bottom: 15px;
                }
                select{
                    width: 100%;
                }
                .in1{
                    width: 95%;
                    padding: 5px 2%;
                }
                .in2{
                    width: 100%;
                }
                .gender{
                    width: 41%;
                    padding: 8px 4%;
                    margin: 0.5%;
                }
            }

            @media screen and (max-width:880px) {
                #row{
                    display: none;
                }
                ul{
                    display: flex;
                    flex-wrap: wrap;
                }
                li{
                    display: block;
                    padding: 5px 0;
                    width: 24%;
                    text-indent: 5px;
                    border-bottom: 1px solid #ccc;
                }
                .col1, .col2{
                    width: 24%;
                }
                .col3{
                    text-align: left;
                }
                li:nth-child(4){
                    border-right: 0;
                }
            }


            @media screen and (max-width:745px) {
                .item{
                    width: 48%;
                }
            }

            @media screen and (max-width:600px) {
                li, .col1, .col2{
                    width: 48%;
                }
                li:nth-of-type(2n){
                    border-right: 0;
                }
            }

            @media screen and (max-width:400px) {
                li, .col1, .col2{
                    width: 99%;
                    border-right: 0;
                }
            }

            @media screen and (max-width:485px) {
                .item{
                    width: 95%;
                }
            }

            @media screen and (max-width:320px) {
                #menu{
                    width: 320px;
                }
            }
        
        </style>

    <!-- php menus  -->
    <?php 
        include "inc_menus.php" 
    ?>
            <form>

                <div class="item">
                    <select>
                        <option>5 rows</option>
                        <option>10 rows</option>
                        <option selected>15 rows</option>
                        <option>20 rows</option>
                        <option>25 rows</option>
                        <option>50 rows</option>
                        <option>100 rows</option>
                    </select>
                </div>

                <div class="item">
                    <select>
                        <option></option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                        <option>E</option>
                    </select>
                </div>

                <div class="item">
                    <input type="text" placeholder="keyword" class="in1"> 
                </div>

                <div class="item">
                    <select>
                        <option></option>
                        <option>Friend</option>
                        <option>Relation</option>
                        <option>Co- Worker</option>
                        <option>Other</option>
                    </select>
                </div>

                <div class="item">
                    <label class="gender">Male <input  type="radio" name="gender"></label>
                    <label class="gender">Fe-Male <input  type="radio" name="gender"></label>
                </div>

                <div class="item">
                    <input type="submit" value="SEARCH" class="in2">    
                </div>
            </form>
            <ul id="row">
                <li class="col1"></li>
                <li class="col2">Name</li>
                <li>Nick</li>
                <li>Mobile No1</li>
                <li>Mobile No2</li>
                <li>Land No</li>
                <li>Type</li>
                <li class="col3">Action</li>
            </ul>

            <ul>
                <li class="col1"><div class="male"></div></li>
                <li class="col2">ananda kumara karunanayaka</li>
                <li>karu</li>
                <li>071-1411365</li>
                <li>072-3258132</li>
                <li>033-5487545</li>
                <li>Co-Worker</li>
                <li class="col3">
                    <a href="view.php?>" class="view"></a>
                    <a href="edit.php?>" class="edit"></a>
                    <a href="delete.php?>" class="delete"></a>
                </li>
            </ul>
            <ul class="row2">
                <li class="col1"><div class="female"></div></li>
                <li class="col2">ananda kumara karunanayaka</li>
                <li>karu</li>
                <li>071-1411365</li>
                <li>072-3258132</li>
                <li>033-5487545</li>
                <li>Co-Worker</li>
                <li class="col3">
                    <a href="view.php?>" class="view"></a>
                    <a href="edit.php?>" class="edit"></a>
                    <a href="delete.php?>" class="delete"></a>
                </li>
            </ul>
            <ul>
                <li class="col1"><div class="male"></div></li>
                <li class="col2">ananda kumara karunanayaka</li>
                <li>karu</li>
                <li>071-1411365</li>
                <li>072-3258132</li>
                <li>033-5487545</li>
                <li>Co-Worker</li>
                <li class="col3">
                    <a href="view.php?>" class="view"></a>
                    <a href="edit.php?>" class="edit"></a>
                    <a href="delete.php?>" class="delete"></a>
                </li>
            </ul>
            <ul class="row2">
                <li class="col1"><div class="female"></div></li>
                <li class="col2">ananda kumara karunanayaka</li>
                <li>karu</li>
                <li>071-1411365</li>
                <li>072-3258132</li>
                <li>033-5487545</li>
                <li>Co-Worker</li>
                <li class="col3">
                    <a href="view.php?>" class="view"></a>
                    <a href="edit.php?>" class="edit"></a>
                    <a href="delete.php?>" class="delete"></a>
                </li>
            </ul>
            <div id="pagination">
                <a href="#" class="pg">1</a>
                <a href="#" class="pg">2</a>
                <a href="#" class="pg">3</a>
                <a class="dots">...</a>
                <a href="#" class="pg">6</a>
                <a href="#" class="pg">7</a>
                <a href="#" class="pg">8</a>
                <a href="#" class="current">9</a>
                <a href="#" class="pg">10</a>
                <a href="#" class="pg">11</a>
                <a href="#" class="pg">12</a>
                <a class="dots">...</a>
                <a href="#" class="pg">18</a>
                <a href="#" class="pg">19</a>
                <a href="#" class="pg">20</a>
            </div>
    <!-- java script code  -->
    <script src="validate.js"></script>  
            
    <!-- php footer -->
    <?php
        include "inc_footer.php" ;
    ?>    