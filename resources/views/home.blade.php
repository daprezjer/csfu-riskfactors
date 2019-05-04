@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Video Introduction</div>
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                      <center><iframe width="557" height="368" src="https://www.youtube.com/embed/ovo6zwv6DX4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
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
                    <div class="card-header">About this Study</div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="<?=asset('images/ICPSR-Blue-Logo.jpg')?>" align="right" />The following study is base on survey data of 8th and 10th grade students by the University of Michigan's Inter-university Consortium for Political and Social Research (ICPSR).
                                    The data span the years 2012 through 2017 and contain a wealth of information, including students' demographics, physical activity, illicit drug and alcohol use, and beliefs on social issues.
                                    <br /><br />
                                    This study utilizes the ICSPR data in an attempt to identify potential risk factors for two potent concerns for high schoolers; illicit drug use in the form of cigarette use and potential signs of depression.
                                    <br /><br />
                                    Specifically, the smoking section attempts to expose risk factors for students who indicate they have tried smoking at least once.  The depression section utilizes a proxy variable, whether
                                    a student feels that "life is meaningless" to do the same.
                                    <br /><br />
                                    The intended audience is school teachers, administrators, and data analysts, who can utilize these reports to identify populations at risk of poor health choices and/or feelings of depression.
                                    To be sure, the results presented here should be carefully scrutinized by eduational professionals, and utilized appropriately and in context.  They should not be used to label or exclude groups
                                    of students, but rather to add additional data to help inform the potential need for care, in effort to make all students happy and healthy.
                                    <br /><br />
                                    <img src="<?=asset('images/fullerton.png')?>" align="right" width="200" />This analysis is conducted by Jeremy Lupoli - an ICPSR program graduate - as a capstone project for the MSIT program at the California State University, Fullerton.  The analysis is his
                                    own and was not conducted as an employee or representative of either the California State University, Fullerton nor the University of Michigan.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection