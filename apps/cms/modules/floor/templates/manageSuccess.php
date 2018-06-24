<div id="sf_admin_container">
    <div class="page-heading animated fadeInDownBig">

        <h1>Manage floor</h1>
    </div>



    <div id="sf_admin_header">
    </div>



    <div>
        <div class="box-info full">
            <h2><strong><?php echo $Floor; ?></strong></h2>


            <div id="sf_admin_content">
                <div id="floorManager">
                    <div id="floorControls">
                        <button id="addTableButton">Add table</button>
                        <div class="tbl">
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <th>Id</th>
                                    <td><span id="showTableId"></span></td>
                                    <td>
                                        <input type="text" id="activeTableNum" placeholder="table #" >
                                    </td>
                                </tr>
                                <tr>
                                    <th>Width</th>
                                    <td><span id="showTableWidth"></span></td>
                                    <td class="controls" rowspan="4">
                                        <button id="saveTableButton">Save</button>
                                        <button id="deleteTableButton">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Height</th>
                                    <td><span id="showTableHeight"></span></td>
                                </tr>
                                <tr>
                                    <th>Left</th>
                                    <td><span id="showTableLeft"></span></td>
                                </tr>
                                <tr>
                                    <th>Top</th>
                                    <td><span id="showTableTop"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div id="floorCanvas" style="width: <?php echo $Floor->width * 10; ?>px; height: <?php echo $Floor->height * 10; ?>px;">
                        <?php foreach($Floor->getPlaces() as $place): ?>
                            <div class="table" data-id="<?php echo $place->id; ?>" data-number="<?php echo $place->number; ?>" style="left: <?php echo $place->posx * 10; ?>px; top: <?php echo $place->posy * 10; ?>px;width: <?php echo $place->width * 10; ?>px; height: <?php echo $place->height * 10; ?>px"><div class="within"><span><?php echo $place->number; ?></span></div></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="sf_admin_actions">
                    <a class="btn btn-default" href="<?php echo url_for('floor/index'); ?>">Back to list</a>
                </div>
            </div>
        </div>

    </div>


</div>
<script type="text/javascript" src="/js/tablecanvas.js"></script>
<script type="text/javascript">
    var URL_createTable = "<?php echo url_for('floor/createPlace?id=' . $Floor->id); ?>";
    var URL_updateTable = "<?php echo url_for('floor/updatePlace'); ?>";
    var URL_deleteTable = "<?php echo url_for('floor/deletePlace'); ?>";
</script>