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
                                  <b>Description:</b> The bars to the left show the percentage of 8th and 10th graders in the study who indicated that they had smoked at least once in their lifetime.<br /><br />
                                  <b>Directions:</b> Use the grouping options to see the prevalence of smoking by different groups and subgroups.
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
                      <?php foreach($models as $model => $variables) { ?>
                      <div class="row models" id="model_<?=$model?>"<?php if ($model != 1) { ?> style="display: none"<?php } ?>>
                        <div class="col-md-12">
                          <em>Model Statistics</em>
                          <table>
                            <tr>
                              <th>Cox & Snell R<sup>2</sup></th>
                              <th>N</th>
                            </tr>
                            <tr>
                              <td><?=$variables[0]['r_squared']?></td>
                              <td><?=$variables[0]['n']?></td>
                            </tr>
                          </table>
                          <br />
                          <em>Indicator Outcomes</em>
                          <table>
                            <tr>
                              <th>Variable</th>
                              <th>Beta</th>
                              <th>Exp(B)</th>
                              <th>Sig.</th>
                              <th>Set</th>
                            </tr>
                            <?php foreach ($variables as $v=>$variable) { ?>
                            <tr>
                              <td><?=$variable['variable']?></td>
                              <td><?=$variable['coefficient']?></td>
                              <td id="<?=$model?>_<?=$v?>_multiplier"><?=round(exp($variable['coefficient']),3)?></td>
                              <td><?=$variable['significance']?><?php if ($variable['significance'] < .001) { ?>*<?php } ?><?php if ($variable['significance'] < .005) { ?>*<?php } ?><?php if ($variable['significance'] < .05) { ?>*<?php } ?></td>
                              <td>
                                <?php if ($v != count($variables) - 1) { ?>
                                <?php if ($variable['variable'] !== 'parent_college_degrees') { ?>
                                <input type="checkbox" name="choose_<?=$v?>_<?=$model?>" data-model="<?=$model?>" data-variable="<?=$v?>" class="choosers_<?=$model?> indicator-setter" value="1" />
                                    <?php } else { ?>
                                    <select name="choose_<?=$v?>_<?=$model?>" data-type="select" data-model="<?=$model?>" data-variable="<?=$v?>" class="choosers_<?=$model?> indicator-setter">
                                      <option value="0">0</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                    </select>
                                  <?php } ?>
                                <?php } else { ?>
                                &nbsp;
                                <?php } ?>
                              </td>
                            </tr>
                            <?php } ?>
                            <tr>
                            <td colspan="4" style="text-align: right">
                              Relative probability:
                            </td>
                            <td id="probability_<?=$model?>">0 %
                            </td>
                          </table>
                          <div style="display: none">
                            <br />
                            <em>EST</em>(P) = <?php foreach($variables as $n => $variable) { ?>
                              <?php if($n == 0) { ?><?php echo($variable['coefficient']) ?><?php } else { ?><?=$variable['coefficient'] < 0 ? '-' : '+' ?> <?php echo(abs($variable['coefficient'])) ?><?php } ?><?php if ($variable['variable'] !== 'constant') { ?><em>*<?php echo($variable['variable']) ?></em><?php } ?>
                             <?php } ?>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <b>Description:</b> The statistical output here reflects the effect of various predictors on whether or not a student has tried smoking.  This is a logistic model, where Exp(B) represents the relative likelihood of a student smoking based on the given factor.<br /><br />
                    <b>Directions:</b> Use the slider to add more or fewer variables to the equation, noting the change in overall accuracy of the model.  Select to set certain variables and get an easy to understand relative probability, based on all the factors.
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
            <div class="card-header">Forecast</div>
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <?php foreach($cis as $i=>$ci) { ?>
                    <div id="forecast_div_<?=$ci?>" style="overflow:hidden<?php if ($i != 0) {?>; height: 0<?php } ?>" class="forecasts"></div>
                    <?php } ?>
                    If the trend continues, we are
                    <select name="forecast" id="forecast">
                      <?php foreach($cis as $ci) { ?>
                      <option value="<?=$ci?>"><?=$ci?></option>
                      <?php } ?>
                    </select>% confident that the percentage of students is within the range above.
                  </div>
                  <div class="col-md-6">
                    <b>Description:</b> The blue line here represents our best estimate of prevalence of smoking in the future, given that current trends hold.<br /><br />
                    <b>Directions:</b> Adjust the confidence interval to widen or tighten our confidence bands.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br />
    <script type="text/javascript">

      google.charts.load('current', {'packages':['bar','corechart', 'line']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var options = {
          title: 'Smoking Prevalence of 8th and 10th Graders',
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

        chart.draw(basicData, options);

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
      };

      <?php
      foreach($cis as $ci) { ?>
      google.charts.setOnLoadCallback(drawForecastChart<?=$ci?>);

      function drawForecastChart<?=$ci?>() {

        var data = google.visualization.arrayToDataTable([
          ['Year', 'Forecast', '<?=$ci?>% Lo CI', '<?=$ci?>% Hi CI'],
          <?php foreach($forecasts as $forecast) { ?>
          ['<?=$forecast['year']?>', <?=$forecast['forecast']*100?>, <?=$forecast['ci_' . $ci . '_lo']*100?>, <?=$forecast['ci_' . $ci . '_hi']*100?>],
          <?php } ?>
        ]);

        var lineOptions = {
          title: 'Forecast for Smoking Prevalence of 8th and 10th Graders',
          legend: {
            position: 'bottom'
          },
        };

        var chart = new google.charts.Line(document.getElementById('forecast_div_<?=$ci?>'));

        chart.draw(data, google.charts.Line.convertOptions(lineOptions));

      };
      <?php } ?>

      $('.indicator-setter').on('change', function() {
        var running = 1;
        var model = $(this).data('model');
        $('.choosers_' + model).each(function (index, option) {
          var variable = $(this).data('variable');
          var multiplier = parseFloat($('#' + model + '_' + variable + '_multiplier').text());
          if ($(option).is(':checked')) {
            running *= multiplier;
          } else if ($(option).attr('data-type') == 'select') {
            if ($(option).val() == '1') {
              running *= multiplier;
            } else if ($(option).val() == '2') {
              running *= multiplier;
              running *= multiplier;
            }
          }
        });
        var relative = Math.round((running - 1) * 100, 0);
        var sign = relative > 0 ? '+' : '';
        $('#probability_' + model).text(sign + relative + '%');
      });

      $('#forecast').on('change', function() {
        var ci = $(this).val();
        $('.forecasts').css('height', 0);
        $('#forecast_div_' + ci).css('height', 'auto');
      });

      $('#range').change(function() {
        var variableNumber = $(this).val();
        $('.models').hide();
        $('#model_' + variableNumber).show();
      });
    </script>
@endsection