<div class="container-fluid" align="left" style="text-align: left;background: url(images/bg5.jpg); background-size: cover;">
    <div class="main-banner2-wrapper" align="left">                       
        <h1 class="welcome" id="search-font1" style="font-family:'Arial Narrow;' text-align:left;word-spacing: 0px; letter-spacing: 0px;">A platform of extensive market reports to cater your specific needs.</h1>
        <h3 id="color-white" class="desktop-only" id="index-search-margin-bottom">Your search for the most accurate market research reports ends here.</h3>
        <div class="col-md-12 search-box">
            <form class="form-inline" id="search-form" method="post" action="reports">
                <center>
                    <div class="col-md-8 col-md-offset-2 search-background">
                        <div class="form-group col-md-10 col-xs-9">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="text" id="search" name="search" placeholder="Search Reports . . ." class="form-control">
                        </div>
                        <button type="submit" class="btn btn-default pull-left col-md-2 col-xs-3" id="btn-search">Search</button>
                    </div>    
                </center>
            </form>
        </div>
    </div>
</div>