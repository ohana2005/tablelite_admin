<div id="sf_admin_container">
    <div class="page-heading animated fadeInDownBig">

        <h1>Manage occupancy</h1>
    </div>



    <div id="sf_admin_header">
    </div>



    <div>
        <div class="box-info full">
            <h2><strong><?php echo $Floor; ?></strong></h2>


            <div id="sf_admin_content">
                <div id="occupancyManager">
                    <div id="dates_filter">
                        <form method="post" action="<?php echo url_for('floor/filterDates'); ?>">
                            <table cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <input type="text" name="date_from" class="datepckr" value="<?php echo date('d.m.Y', strtotime($date_from)); ?>" >
                                    </td>
                                    <td>
                                        <input type="text" name="date_to" class="datepckr" value="<?php echo  date('d.m.Y', strtotime($date_to)); ?>" >
                                    </td>
                                    <td>
                                        <button>Change</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div id="occupancyDates">
                        <table cellpadding="0" cellspacing="0" class="occupancyTable">
                            <tr class="years">
                                <th rowspan="3">Table</th>
                                <?php foreach($period['years'] as $year): ?>
                                    <td colspan="<?php echo $year['span']; ?>"><?php echo $year['year']; ?></td>
                                <?php endforeach; ?>
                            </tr>
                            <tr class="months">
                                <?php foreach($period['months'] as $month): ?>
                                    <td colspan="<?php echo $month['span']; ?>"><?php echo $month['month']; ?></td>
                                <?php endforeach; ?>
                            </tr>
                            <tr class="days">
                                <?php foreach($period['days'] as $day): ?>
                                    <td><?php echo $day['day']; ?></td>
                                <?php endforeach; ?>
                            </tr>
                            <?php foreach($Floor->getPlaces() as $Place): ?>
                                <tr  class="room" data-roomid="<?php echo $Place->id; ?>">
                                    <th><?php echo $Place->number; ?></th>
                                    <?php foreach($period['days'] as $i => $day): ?>
                                        <?php // $occupancy = $Place->getOccupancy($day['fulldate']); ?>
                                            <td class="occupancy occupancy-free">
                                                <div class="occupancy-holder">
                                                    <div class="occupancy-hover"></div>
                                                </div>
                                            </td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div id="priceControls">

                    </div>
                </div>
                <div class="sf_admin_actions">
                    <a class="btn btn-default" href="<?php echo url_for('floor/index'); ?>">Back to list</a>
                </div>
            </div>
        </div>

    </div>


</div>
<script type="text/javascript" src="/js/occupancy.js"></script>
