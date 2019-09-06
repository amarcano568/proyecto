@extends('layout')
@section('contenido')
<div class="d-sm-flex align-items-center pd-y-20 pd-x-30 bg-gray-200">
  <i class="icon ion-ios-home-outline tx-70 lh-0 tx-gray-800"></i>
  <div class="pd-sm-l-20 pd-t-2 mg-t-10 mg-sm-t-0">
    <h4 class="tx-gray-800 mg-b-5">Tablero</h4>
    <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
  </div>
  </div><!-- d-flex -->
  <div class="br-pagebody mg-t-5 pd-x-30">
    <div class="row row-sm">
      <div class="col-sm-6 col-xl-3">
        <div class="bg-info rounded overflow-hidden">
          <div class="pd-x-20 pd-t-20 d-flex align-items-center">
            <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
            <div class="mg-l-20">
              <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Today's Visits</p>
              <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">1,975,224</p>
              <span class="tx-11 tx-roboto tx-white-8">24% higher yesterday</span>
            </div>
          </div>
          <div id="ch1" class="ht-50 tr-y-1"></div>
        </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
          <div class="bg-purple rounded overflow-hidden">
            <div class="pd-x-20 pd-t-20 d-flex align-items-center">
              <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
              <div class="mg-l-20">
                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Today Sales</p>
                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">$329,291</p>
                <span class="tx-11 tx-roboto tx-white-8">$390,212 before tax</span>
              </div>
            </div>
            <div id="ch3" class="ht-50 tr-y-1"></div>
          </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-teal rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">% Unique Visits</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">54.45%</p>
                  <span class="tx-11 tx-roboto tx-white-8">23% average duration</span>
                </div>
              </div>
              <div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Bounce Rate</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">32.16%</p>
                    <span class="tx-11 tx-roboto tx-white-8">65.45% on average time</span>
                  </div>
                </div>
                <div id="ch4" class="ht-50 tr-y-1"></div>
              </div>
          </div><!-- col-3 -->
    </div><!-- row -->
    <div class="row row-sm mg-t-20">
                <div class="col-lg-8">
                  <div class="card bd-0 shadow-base">
                    <div class="d-md-flex justify-content-between pd-25">
                      <div>
                        <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">How Engaged Our Users Daily</h6>
                        <p>Past 30 Days — Last Updated Oct 14, 2017</p>
                      </div>
                      <div class="d-sm-flex">
                        <div>
                          <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Bounce Rate</p>
                          <h4 class="tx-lato tx-inverse tx-bold mg-b-0">23.32%</h4>
                          <span class="tx-12 tx-success tx-roboto">2.7% increased</span>
                        </div>
                        <div class="bd-sm-l pd-sm-l-20 mg-sm-l-20 mg-t-20 mg-sm-t-0">
                          <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Page Views</p>
                          <h4 class="tx-lato tx-inverse tx-bold mg-b-0">38.20%</h4>
                          <span class="tx-12 tx-danger tx-roboto">4.65% decreased</span>
                        </div>
                        <div class="bd-sm-l pd-sm-l-20 mg-sm-l-20 mg-t-20 mg-sm-t-0">
                          <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Time On Site</p>
                          <h4 class="tx-lato tx-inverse tx-bold mg-b-0">12:30</h4>
                          <span class="tx-12 tx-success tx-roboto">1.22% increased</span>
                        </div>
                        </div><!-- d-flex -->
                        </div><!-- d-flex -->
                        <div class="pd-l-25 pd-r-15 pd-b-25">
                          <div id="ch5" class="ht-250 ht-sm-300"></div>
                        </div>
                        </div><!-- card -->
                        
                        </div><!-- col-8 -->
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                          </div><!-- col-4 -->
                          </div><!-- row -->
                          @endsection