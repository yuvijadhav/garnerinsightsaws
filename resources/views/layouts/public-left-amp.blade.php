<style type="text/css">
.text-white{
    color:#FFF !important;
}
</style>
<div class="panel-group">
    <div class="panel panel-default panel-radius">
        <div class="panel-heading text-white sidebar-gradient"><center>Latest Reports</center></div>
        <div class="panel-body"> 

            <div id="latest-news">
                <div class="sidebar-single-item-grid">
                    <div class="item-content" id="report-list">

                    </div>
                </div>
            </div>
            <center><button type="button" class="btn btn-primary"><a class="text-white" href="{{config('app.baseURL')}}/reports">View More</a></button></center>
        </div>
    </div>
</div>

<script type="text/javascript">
var report = <?php echo json_encode($report);?>;
var sidebar="#report-list";
showPaginationData(report,sidebar,public_sidebar);
</script>