@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">About the Development of This Project</div>
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                      This site was creating using PHP, CSS and JavaScript, and utilizes the <a href=https://laravel.com/" target="_blank">Laravel PHP framework</a>, which forms the PHP building blocks and foundation, but no additional code.
                      Laravel is <u>not</u> a content management system, so all other development was coded by hand.
                      The JavaScript-based Chart library utilized was <a href="https://developers.google.com/chart/" target="_blank">Google Charts</a>.
                      This site has been tested on screens with a resolution of 1080px wide or more (tablets in horizontal mode or wider).
                      <br /><br />
                      Total development included approximately 50 files and 10,000 lines of code.  The complete public repository of this code can be found on <a href="https://github.com/daprezjer/csfu-riskfactors" target="_blank">this GitHub repository</a>, including docker files for developers who care to easily spin up the site on their own cloud or local infrastructure.
                      <br /><br />
                      <center><img src="<?=asset('images/php-logo.svg')?>" width="200" /> <img src="<?=asset('images/laravel-logo.png')?>" width="200" /> <img src="<?=asset('images/github-logo.png')?>" width="200" /></center>
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
                    <div class="card-header">Database Structure</div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="<?=asset('images/mysql-logo.svg')?>" width="200" align="right" style="margin-left: 20px" />The database is MySQL, with a fairly simple normalized structure.  Data creating the demographic breakdown are found within the <i>demographics</i> file.  It contains the raw data of the transformed survey results and each record is a respondent.
                                    <br /><br />
                                    The logistic regression breakdown for each dependent variable uses a combination of a <i>_models</i> table - which houses the overall statistics of each of the models that can be altered by the range input - and the <i>indicators</i> table, which simply lists
                                    the available indicators.  The cross-section of those two tables is the <i>_model_indicators</i> table, a pivot table which includes each indicator's coefficients and statistical significance.  The pivot table includes appropriate foreign keys and an appropriate combination unique key.
                                    The Laravel framework uses a primary key in addition to the combination key as a surrogate key by default.  The values for this table were pre-compiled using SPSS.   The relative probabilities were not stored but instead calculated on the fly using JavaScript.
                                    <br /><br />
                                    The <i>_forecasts</i> tables are slightly de-normalized and contains columns on each of the 4 selectable confidence intervals.  The values for this table were pre-compiled using Forecast Pro.
                                    <br /><br />
                                    There were many potential options however these were chosen as a healthy mix between complete normalization and ease of understanding.  See the introductory video for more information.
                                    <br /><br />
                                    A full schema of the analysis datase is below.<br /><br />
                                    <img src="<?=asset('/images/schema.png')?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection