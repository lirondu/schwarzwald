<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>

    <body>

        <div class="form-fields">
            <ul>
                <li>
                    <label for="gallery-title" style="width: 180px;">Gallery Title:</label>
                    <input name="gallery-title" id="gallery-title" type="text" value="<?
                    if (isset($galleryExistTitle)) {
                        echo $galleryExistTitle;
                    }
                    ?>" />
                </li>
            </ul>
            <ul>
                <li>
                    <button id="add-pic">Add Pictures</button>
                    <label id="num-of-pics-lbl" for="num-per-row-spinner">Pictures per row:</label>
                    <input id="num-per-row-spinner" name="num-per-row-spinner" value="<? echo (isset($galleryExistPicsPerRow)) ? $galleryExistPicsPerRow : '0'; ?>" />
<!--                    <label id="zoom-gall" for="zoom-gall">Zoom:</label>
                    <button id="zoom-down"></button>
                    <button id="zoom-up"></button>-->
                </li>
            </ul>
           
        </div>


        <div id="gallery-preview">
            <?
            if (isset($galleryExistContent)) {
                echo $galleryExistContent;
            }
            ?>
        </div>




        <!--######## DIALOGS #########-->	

        <div id="img-pos-dialog">
            <label for="new-idx">Choose new position:</label>
            <select id="new-idx">
                <option value=""></option>
            </select>
            <input type="hidden" id="prev-idx" />
        </div>



        <div id="img-edit-title-dialog">
            <label for="new-idx">Title:</label>
            <input type="text" id="img-title" /> <br /><br />
            <input type="button" id="change-pic-title-ok" value="OK" />
            <input type="button" id="change-pic-title-cancel" value="Cancel" />
            <input type="hidden" id="curr-idx" />
        </div>


        <div id="gallery_fm_dialog">
            <div id="elfinder"></div>
        </div>




        <link href="css/cms-gallery.css" rel="stylesheet" type="text/css" media="screen" />
        <script type="text/javascript" src="js/cms-gallery.js"></script>

    </body>

</html>