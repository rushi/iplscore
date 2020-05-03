<!DOCTYPE html>
<html ng-app="ipl">
    <head>
        <title></title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap/bootstrap.responsive.css">
        <link rel="stylesheet" href="css/score.css">
        
        <script src="js/libs/underscore/underscore.js"></script>
        <script src="js/libs/angular/angular.js"></script>
        <script src="js/score.js"></script>
    </head>
    <body>


        
        <div ng-controller="scoreController" class="container-fluid flat">
            <compiledstyles>here</compiledstyles>

            <div class='row-fluid'>
                <div class='well well-small'>
                    <h2>{{data.matchInfo.description}} - 
                        <span style="color: #{{teams[0].team.primaryColor}}">{{teams[0].team.fullName}}</span> 
                        VS 
                        <span style="color: #{{teams[1].team.primaryColor}}">{{teams[1].team.fullName}}</span>
                        <h6 style="font-size: 9px; margin-top: -10px"> At {{data.matchInfo.venue.fullName}}, {{data.matchInfo.venue.city}}</h6>
                        </h2>
                </div>
            </div>
            <div class='row-fluid' style="margin-top:-21px">
                <div class='span4'></div>
                <div class='well well-small span4 reset-padding'><center><h6 class=''>{{data.matchInfo.additionalInfo.toss}}</h6></center></div>
                <div class='span4'></div>
            </div>
            
            <div class='row-fluid'>

                <!-- TEAM 1 BOX -->
                <div class='span6 well-small well reset-border team0-primary-bg team0-secondary'>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="row-fluid">
                                <div class='current-batsmen reset-border team0-secondary-bg team0-primary'>
                                    <span class='pull-left'>{{data.currentState.facingBatsmanData.shortName}}<sup>*</sup></span>
                                    <span class='pull-right'>
                                        <span><b>{{data.currentState.facingBatsmanData.batting_runs}}</b></span>
                                        <span>({{data.currentState.facingBatsmanData.batting_balls}})</span>
                                        <span>{{data.currentState.facingBatsmanData.batting_fours}}x4</span>
                                        <span>{{data.currentState.facingBatsmanData.batting_sixes}}x6</span>
                                        <span>{{data.currentState.facingBatsmanData.batting_strikeRate}}</span>
                                        <span class='clearfix'></span>
                                    </span>
                                </div>
                                
                                <div class='current-batsmen reset-border team0-secondary-bg team0-primary'>
                                    <span class='pull-left'>{{data.currentState.nonFacingBatsmanData.shortName}}</span>
                                    <span class='pull-right'>
                                        <span><b>{{data.currentState.nonFacingBatsmanData.batting_runs}}</b></span>
                                        <span>({{data.currentState.nonFacingBatsmanData.batting_balls}})</span>
                                        <span>{{data.currentState.nonFacingBatsmanData.batting_fours}}x4</span>
                                        <span>{{data.currentState.nonFacingBatsmanData.batting_sixes}}x6</span>
                                        <span>{{data.currentState.nonFacingBatsmanData.batting_strikeRate}}</span>
                                        <span class='clearfix'></span>
                                    </span>
                                </div>

                                <div class='recent-overs reset-border team0-secondary-bg team0-primary'>
                                    <span class=''>Overs:  <span class='recent-overs-data'>{{data.currentState.recentOversData}}</span></span>
                                </div>
                            </div>


                        </div>
                        <div class="well reset-margin reset-padding reset-bg reset-border span4 center">
                            <h1 class="scorebox team0-primary team0-secondary-bg reset-margin">{{data.innings[0].scorecard.runs}} / {{data.innings[0].scorecard.wkts}}</h1>
                            <div class="row-fluid" style="margin-top:4px">
                                <div class="span6 team0-primary team0-secondary-bg oversbox">Overs: <b>{{data.innings[0].overProgress}}</b></div>
                                <div class="span6 team0-primary team0-secondary-bg runratebox">RR: <b>{{data.innings[0].runRate}}</b></div>
                            </div>
                        </div>
                    </div>

                    <div class='clearfix clear'><br></div>

                    <div class='well well-small team0-secondary-bg team0-primary reset-border'>
                        <table class="table">
                            <tr>
                                <td width='30%'>Player</td>
                                <td> </td>
                                <td>R</td>
                                <td>B</td>
                                <td>4s</td>
                                <td>6s</td>
                                <td>SR</td>
                            </tr>

                            <tr ng-repeat="p in data.matchInfo.teams[0].players">
                                <td>{{p.fullName}}</td>
                                <td>{{p.batting_outReason}}</td>
                                <td>{{p.batting_runs}}</td>
                                <td>{{p.batting_balls}}</td>
                                <td>{{p.batting_fours}}</td>
                                <td>{{p.batting_sixes}}</td>
                                <td>{{p.batting_strikeRate}}</td>

                            </tr>
                        </table>

                    </div>
                </div>
                <!-- END TEAM 1 BOX -->

                <!-- TEAM 2 BOX -->
                <div class='span6 well-small well reset-border team1-primary-bg team1-secondary'>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="row-fluid">
                                <div class='current-batsmen reset-border team1-secondary-bg team1-primary'>
                                    <span class='pull-left'>{{data.currentState.facingBatsmanData.shortName}}<sup>*</sup></span>
                                    <span class='pull-right'>
                                        <span><b>{{data.currentState.facingBatsmanData.batting_runs}}</b></span>
                                        <span>({{data.currentState.facingBatsmanData.batting_balls}})</span>
                                        <span>{{data.currentState.facingBatsmanData.batting_fours}}x4</span>
                                        <span>{{data.currentState.facingBatsmanData.batting_sixes}}x6</span>
                                        <span>{{data.currentState.facingBatsmanData.batting_strikeRate}}</span>
                                        <span class='clearfix'></span>
                                    </span>
                                </div>
                                
                                <div class='current-batsmen reset-border team1-secondary-bg team1-primary'>
                                    <span class='pull-left'>{{data.currentState.nonFacingBatsmanData.shortName}}</span>
                                    <span class='pull-right'>
                                        <span><b>{{data.currentState.nonFacingBatsmanData.batting_runs}}</b></span>
                                        <span>({{data.currentState.nonFacingBatsmanData.batting_balls}})</span>
                                        <span>{{data.currentState.nonFacingBatsmanData.batting_fours}}x4</span>
                                        <span>{{data.currentState.nonFacingBatsmanData.batting_sixes}}x6</span>
                                        <span>{{data.currentState.nonFacingBatsmanData.batting_strikeRate}}</span>
                                        <span class='clearfix'></span>
                                    </span>
                                </div>

                                <div class='recent-overs reset-border team1-secondary-bg team1-primary'>
                                    <span class=''>Overs:  <span class='recent-overs-data'>{{data.currentState.recentOversData}}</span></span>
                                </div>
                            </div>


                        </div>
                        <div class="well reset-margin reset-padding reset-bg reset-border span4 center">
                            <h1 class="scorebox team1-primary team1-secondary-bg reset-margin">{{data.innings[1].scorecard.runs}} / {{data.innings[1].scorecard.wkts}}</h1>
                            <div class="row-fluid" style="margin-top:4px">
                                <div class="span6 team1-primary team1-secondary-bg oversbox">Overs: <b>{{data.innings[1].overProgress}}</b></div>
                                <div class="span6 team1-primary team1-secondary-bg runratebox">RR: <b>{{data.innings[1].runRate}}</b></div>
                            </div>
                        </div>
                    </div>

                    <div class='clearfix clear'><br></div>

                    <div class='well well-small team1-secondary-bg team1-primary reset-border'>
                        <table class="table">
                            <tr>
                                <td width='30%'>Player</td>
                                <td> </td>
                                <td>R</td>
                                <td>B</td>
                                <td>4s</td>
                                <td>6s</td>
                                <td>SR</td>
                            </tr>

                            <tr ng-repeat="p in data.matchInfo.teams[1].players">
                                <td>{{p.fullName}}</td>
                                <td>{{p.batting_outReason}}</td>
                                <td>{{p.batting_runs}}</td>
                                <td>{{p.batting_balls}}</td>
                                <td>{{p.batting_fours}}</td>
                                <td>{{p.batting_sixes}}</td>
                                <td>{{p.batting_strikeRate}}</td>

                            </tr>
                        </table>

                    </div>
                </div>
                <!-- END TEAM 2 BOX -->
            </div>

        </div>
    </body>
</html>
