@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Demographic Breakdown</div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="chart_div"></div>
                                    <br />
                                    Group by:
                                    <select name="demographic1" id="select-demographic-1">
                                        <option value=""></option>
                                        <option value="gender">gender</option>
                                        <option value="race">race</option>
                                        <option value="grade level">grade level</option>
                                    </select>
                                    &nbsp;&nbsp;&nbsp;
                                    Sub Group:
                                    <select name="demographic2" id="select-demographic-2">
                                        <option value=""></option>
                                        <option value="gender">gender</option>
                                        <option value="race">race</option>
                                        <option value="grade level">grade level</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Predictors</div>
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-2" style="text-align: right">1</div>
                        <div class="col-md-8">
                          <div class="slidecontainer">
                            <input type="range" min="1" max="11" value="1" class="slider" id="range">
                          </div>
                        </div>
                        <div class="col-md-2" style="text-align: left">11</div>
                      </div>
                      <div class="row">
                        <div class="col-12" style="text-align: center">
                          # of indicators
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar','corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var options = {
          title: 'Smoking Prevelance of 8th and 10th Graders',
          titleTextStyle: {
            fontSize: '15',
            bold: false,
            fontName: 'Nunito'
          },
          bars: 'vertical',
          hAxis: {position: 'none'},
          vAxis: {
            format: '#.##%',
            // maxValue: .1,
            minValue: 0
          },
          height: 200,
          width: 500,
          legend: {position: 'none'},
          colors: ['#DB4437', '#3266CB', '#F99900'],
          animation: {
            duration: 300,
            easing: 'out',
          },
        };
        var formatter = new google.visualization.NumberFormat({pattern: '#.##%'});

        var basicData = google.visualization.arrayToDataTable([
          ['', ''],
          ['', <?=$demographics['basic'][0]['smoke']?>]
        ]);
        formatter.format(basicData, 1); // format column 1

        var genderData = google.visualization.arrayToDataTable([
          ['Gender', ''],
          ['Male', <?=$demographics['gender'][0]['smoke']?>],
          ['Female', <?=$demographics['gender'][1]['smoke']?>]
        ]);
        formatter.format(genderData, 1); // format column 1

        var genderRaceData = google.visualization.arrayToDataTable([
          ['Gender', 'Black', 'White', 'Hispanic'],
          ['Male', <?=$demographics['genderRace'][0]['smoke']?>,<?=$demographics['genderRace'][1]['smoke']?>,<?=$demographics['genderRace'][2]['smoke']?>],
          ['Female', <?=$demographics['genderRace'][3]['smoke']?>,<?=$demographics['genderRace'][4]['smoke']?>,<?=$demographics['genderRace'][5]['smoke']?>]
        ]);
        formatter.format(genderRaceData, 1); // format column 1
        formatter.format(genderRaceData, 2); // format column 2
        formatter.format(genderRaceData, 3); // format column 3

        var raceGenderData = google.visualization.arrayToDataTable([
          ['Race', 'Male', 'Female'],
          ['Black', <?=$demographics['genderRace'][0]['smoke']?>,<?=$demographics['genderRace'][3]['smoke']?>],
          ['White', <?=$demographics['genderRace'][1]['smoke']?>,<?=$demographics['genderRace'][4]['smoke']?>],
          ['Hispanic', <?=$demographics['genderRace'][2]['smoke']?>,<?=$demographics['genderRace'][5]['smoke']?>]
        ]);
        formatter.format(raceGenderData, 1); // format column 1
        formatter.format(raceGenderData, 2); // format column 2

        var genderGradeLevelData = google.visualization.arrayToDataTable([
          ['Gender', '8th Grade', '10th Grade'],
          ['Male', <?=$demographics['genderGradeLevel'][0]['smoke']?>,<?=$demographics['genderGradeLevel'][1]['smoke']?>],
          ['Female', <?=$demographics['genderGradeLevel'][2]['smoke']?>,<?=$demographics['genderGradeLevel'][3]['smoke']?>]
        ]);
        formatter.format(genderGradeLevelData, 1); // format column 1
        formatter.format(genderGradeLevelData, 2); // format column 2

        var gradeLevelGenderData = google.visualization.arrayToDataTable([
          ['Grade', 'Male', 'Female'],
          ['8th', <?=$demographics['genderGradeLevel'][0]['smoke']?>,<?=$demographics['genderGradeLevel'][2]['smoke']?>],
          ['10th', <?=$demographics['genderGradeLevel'][1]['smoke']?>,<?=$demographics['genderGradeLevel'][3]['smoke']?>]
        ]);
        formatter.format(gradeLevelGenderData, 1); // format column 1
        formatter.format(gradeLevelGenderData, 2); // format column 2

        var raceData = google.visualization.arrayToDataTable([
          ['Race', ''],
          ['Black', <?=$demographics['race'][0]['smoke']?>],
          ['White', <?=$demographics['race'][1]['smoke']?>],
          ['Hispanic', <?=$demographics['race'][2]['smoke']?>]
        ]);
        formatter.format(raceData, 1); // format column 1

        var gradeLevelData = google.visualization.arrayToDataTable([
          ['Grade Level', ''],
          ['8th Grade', <?=$demographics['grade_level'][0]['smoke']?>],
          ['10th Grade', <?=$demographics['grade_level'][1]['smoke']?>]
        ]);
        formatter.format(gradeLevelData, 1); // format column 1

        var gradeLevelRaceData = google.visualization.arrayToDataTable([
          ['Grade Level', 'Black', 'White', 'Hispanic'],
          ['8th Grade', <?=$demographics['raceGradeLevel'][0]['smoke']?>,<?=$demographics['raceGradeLevel'][2]['smoke']?>,<?=$demographics['raceGradeLevel'][4]['smoke']?>],
          ['10th Grade', <?=$demographics['raceGradeLevel'][1]['smoke']?>,<?=$demographics['raceGradeLevel'][3]['smoke']?>,<?=$demographics['raceGradeLevel'][5]['smoke']?>]
        ]);
        formatter.format(gradeLevelRaceData, 1); // format column 1
        formatter.format(gradeLevelRaceData, 2); // format column 2
        formatter.format(gradeLevelRaceData, 3); // format column 3

        var raceGradeLevelData = google.visualization.arrayToDataTable([
          ['Race', '8th', '10th'],
          ['Black', <?=$demographics['raceGradeLevel'][0]['smoke']?>,<?=$demographics['raceGradeLevel'][1]['smoke']?>],
          ['White', <?=$demographics['raceGradeLevel'][2]['smoke']?>,<?=$demographics['raceGradeLevel'][3]['smoke']?>],
          ['Hispanic', <?=$demographics['raceGradeLevel'][4]['smoke']?>,<?=$demographics['raceGradeLevel'][5]['smoke']?>]
        ]);
        formatter.format(raceGradeLevelData, 1); // format column 1
        formatter.format(raceGradeLevelData, 2); // format column 2

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

        $('#select-demographic-1,#select-demographic-2').change(function () {
          var dem1 = $('#select-demographic-1').val();
          var dem2 = $('#select-demographic-2').val();
          options['legend']['position'] = 'none'; // reset
          if (dem1 === 'gender') {
            if (dem2 === 'race') {
              options['legend']['position'] = 'bottom';
              options['title'] = 'Smoking by Gender and Race';
              chart.draw(genderRaceData, options);
            }
            else if (dem2 === 'grade level') {
              options['legend']['position'] = 'bottom';
              options['title'] = 'Smoking by Gender and Grade Level';
              chart.draw(genderGradeLevelData, options);
            }
            else {
              options['title'] = 'Smoking by Gender';
              chart.draw(genderData, options);
            }
          } else if (dem1 === 'race') {
            if (dem2 === 'gender') {
              options['legend']['position'] = 'bottom';
              options['title'] = 'Smoking by Race and Gender';
              chart.draw(raceGenderData, options);
            }
            else if (dem2 === 'grade level') {
              options['legend']['position'] = 'bottom';
              options['title'] = 'Smoking by Race and Grade Level';
              chart.draw(raceGradeLevelData, options);
            }
            else {
              options['title'] = 'Smoking by Race';
              chart.draw(raceData, options);
            }
          } else if (dem1 === 'grade level') {
            if (dem2 === 'gender') {
              options['legend']['position'] = 'bottom';
              options['title'] = 'Smoking by Grade Level and Gender';
              chart.draw(gradeLevelGenderData, options);
            }
            else if (dem2 === 'race') {
              options['legend']['position'] = 'bottom';
              options['title'] = 'Smoking by Grade Level and Race';
              chart.draw(gradeLevelRaceData, options);
            }
            else {
              options['title'] = 'Smoking by Grade Level';
              chart.draw(gradeLevelData, options);
            }
          } else {
            options['title'] = 'Smoking Prevelance of 8th and 10th Graders';
            $('#select-demographic-2').val('');
            chart.draw(basicData, options);
          }
          selectOptions(dem1);
        });

        function selectOptions(value) {
          var curval = $('#select-demographic-2').val();
          var options = ['','gender','race','grade level'];
          $('#select-demographic-2').html('');
          $.each(options, function (index, option) {
            if (option !== value) {
              $('#select-demographic-2').append($('<option/>', {
                value: option,
                text: option
              }));
            }
          });
          $('#select-demographic-2').val(curval);
        };

        chart.draw(basicData, options);

        $('#range').change(function() {
          variableNumber = $(this).val();
          

        });
      };
    </script>
@endsection