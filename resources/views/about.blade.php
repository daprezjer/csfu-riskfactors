@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">About the Survey</div>
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                      <img src="<?=asset('images/ICPSR-Blue-Logo.jpg')?>" align="right" style="margin-left: 20px" />The survey used to create these interactive visualizations was the ICSPR "Monitoring the Future" Survey, which may be downloaded <a href="https://www.icpsr.umich.edu/icpsrweb/NAHDAP/series/35" target="_blank">here</a>.
                      For convenience, you may download a succinct SPSS dataset of the initial and transformed variables discussed on this site below, combining all years of data and including human readable variable names.
                      <br /><br />
                      <center><a href="<?=asset('/data/full.sav')?>" target="_blank"><img src="<?=asset('images/download-icon.png')?>" width="100" /></a><br />
                      (.sav file 20 mb)</center>
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
                    <div class="card-header">About the Analysis Tools and Basic Analytic Decisions</div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <img src="<?=asset('images/forecast-pro-logo.png')?>" width="200" />
                                        <img src="<?=asset('images/spss-logo.png')?>" width="200" />
                                    </center>
                                    For sake of ease, the survey results were transformed and analyzed in SPSS.  Forecast analysis was conducted using Forecast Pro.
                                    <br /><br />
                                    Missing values were ignored (not extrapolated) due to generally large samples of available data.  All non-dichotomous variables
                                    were transformed into dichotmous ones, for sake of parsimony and because survey responses could not assuredly
                                    be interval level.
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
                    <div class="card-header">Survey Questions, Labels and Recodes</div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    The following are relevant survey questions and potential responses.  Variables were renamed in the file above for human-readability and ease of use.
                                    Per above, many variables were recoded into dichotomous versions of themselves.
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Survey Variable / Renamed</th>
                                                <th scope="col">Question</th>
                                                <th scope="col">Potential values<br />(non-missing)</th>
                                                <th scope="col">Recode</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    V7101D /
                                                    ever_smoke
                                                </td>
                                                <td>
                                                    Have you ever smoked cigarettes? (pre-transformed by ICSPR survey)
                                                </td>
                                                <td>
                                                    0="No" 1="Yes"
                                                </td>
                                                <td>
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    V8502 / depression_ind
                                                </td>
                                                <td>
                                                    How much do you agree or disagree with each of the following statements? Life often seems meaningless.
                                                </td>
                                                <td>
                                                    1="Disagree" 2="Mostly Disagree" 3="Neither" 4="Mostly Agree" 5="Agree"
                                                </td>
                                                <td>
                                                    4 and 5 to 1, else 0.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    V501 / tenth_grade
                                                </td>
                                                <td>
                                                    N/A (Known)
                                                </td>
                                                <td>
                                                    8="8th Grade" 10="10th Grade"
                                                </td>
                                                <td>
                                                    8 into 0, 10 into 1.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    V7259 / parent_awareness
                                                </td>
                                                <td>
                                                    The following questions are about your parents (or stepparents or guardians): My parents know where I am after school.
                                                </td>
                                                <td>
                                                    1="Never" 2="Rarely" 3="Sometimes" 4="Most of the time" 5="Always"
                                                </td>
                                                <td>
                                                    4 and 5 to 1, else 0.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    V509 /
                                                    rural
                                                </td>
                                                <td>
                                                    Known, whether school area was in a Standard Metropolitan Statistical Area.
                                                </td>
                                                <td>
                                                    0="No" 1="Yes"
                                                </td>
                                                <td>
                                                    1 into 0, 0 into 1.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    V7206 /
                                                    black
                                                </td>
                                                <td>
                                                    "How do you describe yourself?"
                                                </td>
                                                <td>
                                                    1="Black or African American" , 2="White (Caucasian)", 3=Hispanic
                                                </td>
                                                <td>
                                                    0 into 1, else 0.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    V7206 /
                                                    hispanic
                                                </td>
                                                <td>
                                                    "How do you describe yourself?"
                                                </td>
                                                <td>
                                                    1="Black or African American" , 2="White (Caucasian)", 3=Hispanic
                                                </td>
                                                <td>
                                                    3 into 1, else 0.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    V7206 /
                                                    father_present
                                                </td>
                                                <td>
                                                    Which of the following people live in the same household with you? Father (or stepfather).
                                                </td>
                                                <td>
                                                    0="UNMARKED" 1="MARKED"
                                                </td>
                                                <td>
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    V507 / south
                                                </td>
                                                <td>
                                                    N/A (Known)
                                                </td>
                                                <td>
                                                    1=Northeast 2=North Central 3=South 4=West
                                                </td>
                                                <td>
                                                    3 into 1, else 0.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    V7215 & V7216 / parent_college_degrees
                                                </td>
                                                <td>
                                                    N/A (Known)
                                                </td>
                                                <td>
                                                    1="Completed grade school or less" 2="Some high school" 3="Completed high school"
                                                    4="Some college" 5="Completed college" 6="Graduate or professional school after
                                                    college" 7="Don't know, or does not apply"
                                                </td>
                                                <td>
                                                    Each recoded 5 and 6 into 1, else 0.  Summed.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    V7215 & V7216 / parent_college_degrees
                                                </td>
                                                <td>
                                                    N/A (Known)
                                                </td>
                                                <td>
                                                    1="Completed grade school or less" 2="Some high school" 3="Completed high school"
                                                    4="Some college" 5="Completed college" 6="Graduate or professional school after
                                                    college" 7="Don't know, or does not apply"
                                                </td>
                                                <td>
                                                    Each recoded 5 and 6 into 1, else 0.  Summed. If either missing, missing.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    V7215 & V7216 / parent_college_degree
                                                </td>
                                                <td>
                                                    N/A (Known)
                                                </td>
                                                <td>
                                                    1="Completed grade school or less" 2="Some high school" 3="Completed high school"
                                                    4="Some college" 5="Completed college" 6="Graduate or professional school after
                                                    college" 7="Don't know, or does not apply"
                                                </td>
                                                <td>
                                                    Each recoded 5 and 6 into 1, else 0.  If one or both coded 1, value is 1. If either missing, missing.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>V7219 / religious</td>
                                                <td>How often do you attend religious services?</td>
                                                <td>1="Never" 2="Rarely" 3="Once or twice a month" 4="About once a week or more"</td>
                                                <td>3 and 4 into 1, else 0.</td>
                                            </tr>
                                            <tr>
                                                <td>V7202 / male</td>
                                                <td>What is your sex?</td>
                                                <td>1="Male" 2="Female"</td>
                                                <td>2 into 0.</td>
                                            </tr>
                                            <tr>
                                                <td>V7202 / drug_education</td>
                                                <td>Have you had any drug education courses or lectures in school?</td>
                                                <td>1="No" 2="No, and I wish I had" 3="Yes"</td>
                                                <td>1 and 2 into 0, 3 into 1.</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                    <div class="card-header">Forecast Selection</div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    The smoking forecast was created using an exponential curve fitting model.  The MAPE for the historical fit was 1.83%, meaning the fit was terrific and only 1.83% of the true historical value.  This helps account for the very compact confidence intervals.
                                    <br /><br />
                                    The depression proxy forecast was created using Holt's exponential smoothing (linear trend, no seasonal trend).  The MAPE for the historical fit was 6.38%, meaning the fit was 6.38% away from the true historical value.
                                    <br /><br />
                                    Given the truncated historical nature of the data, holdout analysis was not appropriate.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection