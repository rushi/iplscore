//'use strict';

var app = angular.module('ipl',[])

//Todo controller
app.controller('scoreController', function($scope, $location){
    $scope.data = {"matchInfo":{"description":"Match 38","matchType":"IPLT20","venue":{"id":1,"country":"India","fullName":"M. A. Chidambaram Stadium","shortName":"Chidambaram","city":"Chennai"},"battingOrder":[0,1],"additionalInfo":{"toss.elected":"Kolkata Knight Riders, who chose to field","match.video.id":"89f14c0d5ae64c72a46f96cbd560bbfa","match.summary":"","photostream.link":"http://www.iplt20.com/photos/142/ipl-2013-match-38-csk-v-kkr","home.team.fan.total":"17482\t","notes.1.1":"Powerplay - 67 runs, 0 wickets","away.team.fan.total":"8605","notes.1.2":"CSK: 50 runs in 5.1 overs ","umpire.name.3":"Chettithody Shamsuddin","notes.1.3":"1st Wicket: 50 runs in 31 balls (Wriddhiman Saha 15, Michael Hussey 37)","umpire.name.4":"Krishnamachari Srinivasan","notes.1.4":"Michael Hussey: 50 off 31 balls (7 x fours, 1 x six)","umpire.name.1":"Aleem Dar","umpire.name.2":"Simon Taufel","notes.1.5":"CSK: 100 runs in 9.3 overs ","notes.1.6":"1st Wicket: 100 runs in 57 balls (Wriddhiman Saha 38, Michael Hussey 62)","notes.1.7":"CSK: 150 runs in 14.6 overs ","notes.1.8":"2nd Wicket: 50 runs in 31 balls (Michael Hussey 32, Suresh Raina 18)","notes.1.9":"CSK: 200 runs in 19.6 overs","highlights.link":"http://iplt20.com/videos/media/id/89f14c0d5ae64c72a46f96cbd560bbfa/m38-csk-vs-kkr-match-highlights","result.playerofthematch":"Michael Hussey","match.photo.id":"17499","notes.1.10":"Innings Break: CSK - 200/3 in 20 overs","referee.name":"Andy Pycroft","toss.winner":"Kolkata Knight Riders","notes.2.5":"4th Wicket: 50 runs in 27 balls (Mavinda Bisla 31, Eoin Morgan 17)","notes.2.6":"KKR: 150 runs in 16.6 overs ","notes.2.3":"KKR: 100 runs in 12.3 overs ","notes.2.4":"Manvinder Bisla: 50 off 43 balls (7 x fours, 1 x six)","notes.2.1":"Powerplay: 63 runs, 2 wickets","report.link":"http://www.iplt20.com/news/2013/match-reports/3449/report-match-38-csk-vs-kkr","notes.2.2":"KKR: 50 runs in 4.6 overs"},"teams":[{"id":1464,"players":[{"names":["Wriddhiman Saha","W Saha"],"dateOfBirth":467424000000,"id":16,"fullName":"Wriddhiman Saha","shortName":"W Saha","nationality":"Indian"},{"names":["Michael Hussey","M Hussey"],"dateOfBirth":170380800000,"id":20,"fullName":"Michael Hussey","shortName":"M Hussey","nationality":"Australian"},{"names":["Suresh Raina","S Raina"],"dateOfBirth":533433600000,"id":14,"fullName":"Suresh Raina","shortName":"S Raina","nationality":"Indian"},{"names":["Subramaniam Badrinath","S Badrinath"],"dateOfBirth":336441600000,"id":12,"fullName":"Subramaniam Badrinath","shortName":"S Badrinath","nationality":"Indian"},{"names":["MS Dhoni","MS Dhoni"],"dateOfBirth":363312000000,"id":1,"fullName":"MS Dhoni","shortName":"MS Dhoni","nationality":"Indian"},{"names":["Ravindra Jadeja","R Jadeja"],"dateOfBirth":597369600000,"id":9,"fullName":"Ravindra Jadeja","shortName":"R Jadeja","nationality":"Indian"},{"names":["Dwayne Bravo","DJ Bravo"],"dateOfBirth":434332800000,"id":25,"fullName":"Dwayne Bravo","shortName":"DJ Bravo","nationality":"West Indian"},{"names":["Chris Morris","C Morris"],"rightHandedBat":true,"dateOfBirth":546739200000,"id":836,"fullName":"Chris Morris","shortName":"C Morris","nationality":"South African"},{"names":["Ravichandran Ashwin","R Ashwin"],"dateOfBirth":527299200000,"id":8,"fullName":"Ravichandran Ashwin","shortName":"R Ashwin","nationality":"Indian"},{"names":["Dirk Nannes","D Nannes"],"dateOfBirth":201052800000,"id":237,"fullName":"Dirk Nannes","shortName":"D Nannes","nationality":"Australian"},{"names":["Mohit Sharma","M Sharma"],"dateOfBirth":693100800000,"id":1107,"fullName":"Mohit Sharma","shortName":"M Sharma","nationality":"Indian"}],"team":{"type":"m","fullName":"Chennai Super Kings","shortName":"Super Kings","abbreviation":"CSK","primaryColor":"FDB913","secondaryColor":"FFFFFF","id":1},"wicketKeeper":{"names":["MS Dhoni","MS Dhoni"],"dateOfBirth":363312000000,"id":1,"fullName":"MS Dhoni","shortName":"MS Dhoni","nationality":"Indian"},"captain":{"names":["MS Dhoni","MS Dhoni"],"dateOfBirth":363312000000,"id":1,"fullName":"MS Dhoni","shortName":"MS Dhoni","nationality":"Indian"}},{"id":1463,"players":[{"names":["Manvinder Bisla","M Bisla"],"dateOfBirth":472953600000,"id":90,"fullName":"Manvinder Bisla","shortName":"M Bisla","nationality":"Indian"},{"names":["Gautam Gambhir","G Gambhir"],"dateOfBirth":371865600000,"id":84,"fullName":"Gautam Gambhir","shortName":"G Gambhir","nationality":"Indian"},{"names":["Brendon McCullum","B McCullum"],"dateOfBirth":370396800000,"id":202,"fullName":"Brendon McCullum","shortName":"B McCullum","nationality":"New Zealander"},{"names":["Yusuf Pathan","Y Pathan"],"dateOfBirth":406339200000,"id":96,"fullName":"Yusuf Pathan","shortName":"Y Pathan","nationality":"Indian"},{"names":["Jacques Kallis","J Kallis"],"dateOfBirth":182649600000,"id":198,"fullName":"Jacques Kallis","shortName":"J Kallis","nationality":"South African"},{"names":["Eoin Morgan","E Morgan"],"dateOfBirth":526694400000,"id":197,"fullName":"Eoin Morgan","shortName":"E Morgan","nationality":"English"},{"names":["Debabrata Das","D Das"],"dateOfBirth":527731200000,"id":259,"fullName":"Debabrata Das","shortName":"D Das","nationality":"Indian"},{"names":["Rajat Bhatia","R Bhatia"],"dateOfBirth":309398400000,"id":92,"fullName":"Rajat Bhatia","shortName":"R Bhatia","nationality":"Indian"},{"names":["Sunil Narine","S Narine"],"dateOfBirth":580608000000,"id":203,"fullName":"Sunil Narine","shortName":"S Narine","nationality":"West Indian"},{"names":["Shami Ahmed","S Ahmed"],"dateOfBirth":636940800000,"id":94,"fullName":"Shami Ahmed","shortName":"S Ahmed","nationality":"Indian"},{"names":["Lakshmipathy Balaji","L Balaji"],"dateOfBirth":370396800000,"id":87,"fullName":"Lakshmipathy Balaji","shortName":"L Balaji","nationality":"Indian"}],"team":{"type":"m","fullName":"Kolkata Knight Riders","shortName":"Knight Riders","abbreviation":"KKR","primaryColor":"6F2C91","secondaryColor":"FFFFFF","id":5},"wicketKeeper":{"names":["Manvinder Bisla","M Bisla"],"dateOfBirth":472953600000,"id":90,"fullName":"Manvinder Bisla","shortName":"M Bisla","nationality":"Indian"},"captain":{"names":["Gautam Gambhir","G Gambhir"],"dateOfBirth":371865600000,"id":84,"fullName":"Gautam Gambhir","shortName":"G Gambhir","nationality":"Indian"}}],"matchDate":"2013-04-28T16:00:00+0530","matchState":"C","matchStatus":{"text":"Chennai Super Kings won by 14 runs","outcome":"A"},"isLimitedOvers":true,"matchSummary":""},"matchId":{"tournamentId":{"name":"ipl2013","id":605},"name":"ipl2013-38","id":653,"parentId":{"name":"ipl2013","id":605}},"innings":[{"inningsNumber":1,"scorecard":{"runs":200,"wkts":3,"battingStats":[{"mod":{"text":"c Eoin Morgan b Rajat Bhatia","dismissedBp":{"over":11,"innings":1,"ball":1},"countingBp":{"over":11,"innings":1,"ball":1},"bowlerId":92,"additionalPlayerIds":[197],"dismissedMethod":"ct"},"playerId":16,"r":39,"b":23,"sr":"169.56","4s":4,"6s":2},{"mod":{"text":"c Debabrata Das b Sunil Narine","dismissedBp":{"over":16,"innings":1,"ball":5},"countingBp":{"over":16,"innings":1,"ball":5},"bowlerId":203,"additionalPlayerIds":[259],"dismissedMethod":"ct"},"playerId":20,"r":95,"b":59,"sr":"161.01","4s":11,"6s":2},{"mod":{"text":"run out (Debabrata Das)","dismissedBp":{"over":20,"innings":1,"ball":2},"countingBp":{"over":20,"innings":1,"ball":2},"bowlerId":87,"additionalPlayerIds":[259],"dismissedMethod":"ro"},"playerId":14,"r":44,"b":25,"sr":"176.00","4s":4,"6s":1},{"playerId":1,"r":18,"b":12,"sr":"150.00","4s":1,"6s":1},{"playerId":9,"r":1,"b":1,"sr":"100.00","4s":0,"6s":0}],"bowlingStats":[{"playerId":96,"r":18,"w":0,"ov":"2","d":2,"maid":0,"e":"9.00","wd":0,"nb":0},{"playerId":94,"r":20,"w":0,"ov":"2","d":7,"maid":0,"e":"10.00","wd":1,"nb":0},{"playerId":87,"r":45,"w":0,"ov":"4","d":4,"maid":0,"e":"11.25","wd":1,"nb":0},{"playerId":203,"r":35,"w":1,"ov":"4","d":8,"maid":0,"e":"8.75","wd":0,"nb":0},{"playerId":198,"r":50,"w":0,"ov":"4","d":2,"maid":0,"e":"12.50","wd":0,"nb":0},{"playerId":92,"r":31,"w":1,"ov":"4","d":4,"maid":0,"e":"7.75","wd":0,"nb":0}],"extras":{"wideRuns":2,"byeRuns":1},"fow":[{"playerId":16,"r":103,"w":1,"bp":{"over":11,"innings":1,"ball":1}},{"playerId":20,"r":158,"w":2,"bp":{"over":16,"innings":1,"ball":5}},{"playerId":14,"r":190,"w":3,"bp":{"over":20,"innings":1,"ball":2}}]},"overProgress":"20","runRate":"10.00","overHistory":[{"ovNo":1,"ovBalls":[".","1","2","2",".","1"]},{"ovNo":2,"ovBalls":[".",".",".","4",".","1"]},{"ovNo":3,"ovBalls":["2",".","4","4",".","4"]},{"ovNo":4,"ovBalls":[".","4","4",".","1Wd","6","."]},{"ovNo":5,"ovBalls":[".","4","4",".",".","1"]},{"ovNo":6,"ovBalls":["4","3","4","6","1","."]},{"ovNo":7,"ovBalls":["1","1","1",".","1","1"]},{"ovNo":8,"ovBalls":["1","6","1","4","1","1"]},{"ovNo":9,"ovBalls":["2","1","1","1","1","4"]},{"ovNo":10,"ovBalls":["1","2","2","1",".","1"]},{"ovNo":11,"ovBalls":["W","1","1",".",".","1"]},{"ovNo":12,"ovBalls":["1",".","1","4",".","2"]},{"ovNo":13,"ovBalls":["1","2","4","1","1","4"]},{"ovNo":14,"ovBalls":["6","1",".",".","1","4"]},{"ovNo":15,"ovBalls":["1","1","1","1","2","6"]},{"ovNo":16,"ovBalls":["1","1","4","1","W","."]},{"ovNo":17,"ovBalls":["4","2","1",".","1B","2"]},{"ovNo":18,"ovBalls":["1","2","1","1Wd","1","1","4"]},{"ovNo":19,"ovBalls":["1","1","1","1","4","1"]},{"ovNo":20,"ovBalls":["1","1W","2","1","1","6"]}]},{"inningsNumber":2,"scorecard":{"runs":186,"wkts":4,"battingStats":[{"mod":{"text":"run out (Michael Hussey)","dismissedBp":{"over":19,"innings":2,"ball":4},"countingBp":{"over":19,"innings":2,"ball":3},"bowlerId":25,"additionalPlayerIds":[20],"dismissedMethod":"ro"},"playerId":90,"r":92,"b":61,"sr":"150.81","4s":14,"6s":2},{"mod":{"text":"b Chris Morris","dismissedBp":{"over":3,"innings":2,"ball":4},"countingBp":{"over":3,"innings":2,"ball":4},"bowlerId":836,"dismissedMethod":"b"},"playerId":84,"r":14,"b":8,"sr":"175.00","4s":3,"6s":0},{"mod":{"text":"b Mohit Sharma","dismissedBp":{"over":6,"innings":2,"ball":6},"countingBp":{"over":6,"innings":2,"ball":6},"bowlerId":1107,"dismissedMethod":"b"},"playerId":202,"r":6,"b":7,"sr":"85.71","4s":1,"6s":0},{"mod":{"text":"c Dirk Nannes b Dwayne Bravo","dismissedBp":{"over":13,"innings":2,"ball":2},"countingBp":{"over":13,"innings":2,"ball":2},"bowlerId":25,"additionalPlayerIds":[237],"dismissedMethod":"ct"},"playerId":198,"r":19,"b":20,"sr":"95.00","4s":0,"6s":1},{"playerId":197,"r":32,"b":22,"sr":"145.45","4s":2,"6s":2},{"playerId":96,"r":3,"b":3,"sr":"100.00","4s":0,"6s":0}],"bowlingStats":[{"playerId":237,"r":50,"w":0,"ov":"4","d":8,"maid":0,"e":"12.50","wd":3,"nb":1},{"playerId":1107,"r":23,"w":1,"ov":"4","d":10,"maid":0,"e":"5.75","wd":0,"nb":0},{"playerId":836,"r":29,"w":1,"ov":"3","d":6,"maid":0,"e":"9.66","wd":0,"nb":0},{"playerId":9,"r":13,"w":0,"ov":"2","d":5,"maid":0,"e":"6.50","wd":0,"nb":0},{"playerId":8,"r":26,"w":0,"ov":"3","d":3,"maid":0,"e":"8.66","wd":0,"nb":0},{"playerId":25,"r":37,"w":1,"ov":"4","d":6,"maid":0,"e":"9.25","wd":3,"nb":0}],"extras":{"noBallRuns":1,"wideRuns":11,"byeRuns":4,"legByeRuns":4},"fow":[{"playerId":84,"r":32,"w":1,"bp":{"over":3,"innings":2,"ball":4}},{"playerId":202,"r":63,"w":2,"bp":{"over":6,"innings":2,"ball":6}},{"playerId":198,"r":99,"w":3,"bp":{"over":13,"innings":2,"ball":2}},{"playerId":90,"r":178,"w":4,"bp":{"over":19,"innings":2,"ball":3}}]},"overProgress":"20","runRate":"9.30","overHistory":[{"ovNo":1,"ovBalls":["5Wd","1Nb","4B",".","1","1","2Wd",".","4"]},{"ovNo":2,"ovBalls":[".",".","4",".","1","1"]},{"ovNo":3,"ovBalls":["4",".","4","W",".","."]},{"ovNo":4,"ovBalls":[".",".",".",".","1","."]},{"ovNo":5,"ovBalls":["4","4","4","1Lb","1","4"]},{"ovNo":6,"ovBalls":["4","1","2","4","1Lb","W"]},{"ovNo":7,"ovBalls":["1",".","1",".","1Wd",".","1"]},{"ovNo":8,"ovBalls":["1","1","1",".","1","1"]},{"ovNo":9,"ovBalls":["1","1","1","1",".","."]},{"ovNo":10,"ovBalls":["1","1",".","1",".","6"]},{"ovNo":11,"ovBalls":["6",".","2",".","1","."]},{"ovNo":12,"ovBalls":["1",".","1","1","1","1"]},{"ovNo":13,"ovBalls":[".","W","1","2","1","4"]},{"ovNo":14,"ovBalls":["4","4","1","1","1","1"]},{"ovNo":15,"ovBalls":["1",".","4","1Lb",".","1"]},{"ovNo":16,"ovBalls":["1",".","4","1",".","6"]},{"ovNo":17,"ovBalls":["4","1","1Wd",".","1","4","2"]},{"ovNo":18,"ovBalls":["6","1Lb","4","6",".","4"]},{"ovNo":19,"ovBalls":["4","1Wd","1","W","1Wd","1","1","1"]},{"ovNo":20,"ovBalls":[".","1","1",".","1","1"]}]}],"currentState":{"phase":"C","facingBatsman":96,"nonFacingBatsman":197,"currentInningsIndex":1,"currentBowler":-1,"currentBatsmen":[96,197],"recentOvers":[{"ovNo":15,"ovBalls":["1",".","4","1Lb",".","1"]},{"ovNo":16,"ovBalls":["1",".","4","1",".","6"]},{"ovNo":17,"ovBalls":["4","1","1Wd",".","1","4","2"]},{"ovNo":18,"ovBalls":["6","1Lb","4","6",".","4"]},{"ovNo":19,"ovBalls":["4","1Wd","1","W","1Wd","1","1","1"]},{"ovNo":20,"ovBalls":[".","1","1",".","1","1"]}],"currentPartnership":8}};
    $scope.data.players = {};

    $scope.getPlayers = function(){
        _.each($scope.data.matchInfo.teams, function(team){
            current_team = team.id
            _.each(team.players, function(player){
                player.team_id = current_team
                $scope.data.players[player.id] = player; 
            });
        });
    }

    $scope.getPlayerStats = function(){
        _.each($scope.data.innings, function(inning){
            _.each(inning.scorecard.battingStats, function(record){
                $scope.data.players[record.playerId].batting_runs = record.r;
                $scope.data.players[record.playerId].batting_balls = record.b;
                $scope.data.players[record.playerId].batting_strikeRate = record.sr;
                $scope.data.players[record.playerId].batting_fours = record['4s'];
                $scope.data.players[record.playerId].batting_sixes = record['6s'];
                $scope.data.players[record.playerId].batting_outReason = record.mod && record.mod.text ? record.mod.text : '';
            });

        });
    }

    $scope.getRecentOvers = function(){
        var i = 4;
        _.each($scope.data.currentState.recentOvers, function(over){
            i--;
            if(i){
                if($scope.data.currentState.recentOversData)
                    $scope.data.currentState.recentOversData +=  "  |  " + over.ovBalls.join(", ");
                else
                    $scope.data.currentState.recentOversData =  over.ovBalls.join(", ");
            }            

        });
    }
    
    $scope.getPlayers();
    $scope.getPlayerStats();
    $scope.getRecentOvers();

    console.log($scope.data)


    $scope.teams = $scope.data.matchInfo.teams;
    $scope.data.matchInfo.additionalInfo.toss = $scope.data.matchInfo.additionalInfo['toss.elected']
    $scope.data.currentState.facingBatsmanData = $scope.data.players[$scope.data.currentState.facingBatsman];
    $scope.data.currentState.nonFacingBatsmanData = $scope.data.players[$scope.data.currentState.nonFacingBatsman];

    //empty method to do nothing
    $scope.doNothing = function(){
        return false;
    }

    

});


app.directive('compiledstyles',function(){
    return{
        restrict: 'E',
        replace: true,
        templateUrl: 'js/templates/styles.html'
    };

});

