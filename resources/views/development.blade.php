@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">About the Develoment of This Project</div>
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                      This site was creating using PHP, and utilizes the <a href=https://laravel.com/" target="_blank">Laravel PHP framework</a>, which essentially creates the PHP building blocks and foundation, but no additional code.  It does not contain a content management system, so all other development was coded by hand.
                      <br /><br />
                      Total development included approximately 50 files and 10,000 lines of code.  The complete public repository of this code can be found on this GitHub repository, including docker files for developers who care to easily spin up the site on their own cloud or local infrastructure.
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
                    <div class="card-header">Survey Questions for Relevant Dependent Variables</div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    The following are the un-transformed survey question variables and response options that were pertinent to this anaylsis.
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Variable</th>
                                                <th scope="col">Question</th>
                                                <th scope="col">Potential values (non-missing)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    V7101D
                                                </td>
                                                <td>
                                                    Have you ever smoked cigarettes? (pre-transformed by ICSPR survey)
                                                </td>
                                                <td>
                                                0="No", 1="Yes"
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    V8502
                                                </td>
                                                <td>
                                                    How much do you agree or disagree with each of the following statements? Life often seems meaningless.
                                                </td>
                                                <td>
                                                    1="Disagree" 2="Mostly Disagree" 3="Neither" 4="Mostly Agree" 5="Agree"
                                                </td>
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
                    <div class="card-header">Dichotomous Transformations and Renaming of Dependent Variables</div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    The following are the transformed and renamed survey question variables and response options that were pertinent to this analysis.
                                    The many independent variable transformation should be obvious, however the introductory video explains these in
                                    depth.
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>New Variable</th><th>Original</th><th>Transformation</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                ever_smoke
                                            </td>
                                            <td>
                                                V7101D
                                            </td>
                                            <td>
                                                None (rename only)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                depression_ind
                                            </td>
                                            <td>
                                                V8502
                                            </td>
                                            <td>
                                                4 (Mostly agree) and 5 (Agree) transformed into 1 (Yes).  Remainder transformed to 0 (No).
                                            </td>
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
    </div>
@endsection