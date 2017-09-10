<?php
/**
 * Created by PhpStorm.
 * User: mohsin
 * Date: 8/26/2017
 * Time: 12:21 PM
 */
?>


    <div class="container">
        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <div class="navbar-brand">
                <a href="index.html" >
                    <img src="{{asset('frontend/images/logo.png')}}" width="120" height="" alt="">
                </a>
            </div>
            <!-- /logo -->
        </div>
        <!-- main menu -->
        <nav class="collapse navbar-collapse navbar-right" role="navigation">
            <div class="main-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Service <span
                                    class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="service.html">What We Do</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="lead-generation.html">Lead Generation</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
        </nav>
        <!-- /main nav -->
    </div>

