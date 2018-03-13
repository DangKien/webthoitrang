@extends('layouts.master') @section('content')
<div class="artist-products-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <div class="sidebar-nav">
                    <div class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <span class="visible-xs navbar-brand">Sidebar menu</span>
                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a href="#">Profile</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-9">
                <div class="content content-update-profile">
                    <div class="col-sm-3">
                        <div class="edit-avatar">
                            <img src="https://ushift.dev/uploads/local/64/images/1515641723_maxresdefault.jpg" alt="">
                            <button class="ui-btn">Upload Avatar</button>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <form action="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="ui-label" for="first_name">First Name</label>
                                        <input type="text" class="ui-form-control" id="first_name" name="first_name" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="ui-label" for="last_name">Last Name</label>
                                        <input type="text" class="ui-form-control" id="last_name" name="last_name" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="ui-label" for="email">Email</label>
                                        <input type="email" class="ui-form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="ui-label" for="birth">Birth date</label>
                                        <input type="text" class="ui-form-control" id="birth" name="birth" placeholder="Birth date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="ui-label" for="phone_area_code">Phone area code</label>
                                        <select name="phone_area_code" id="phone_area_code" class="ui-form-control">
                                            <option value="vi">Viet Nam</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="ui-label" for="phone_number">Phone number</label>
                                        <input type="text" class="ui-form-control" id="phone_number" name="phone_number" placeholder="Phone number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="ui-label" for="address">Address</label>
                                        <input type="text" class="ui-form-control" id="address" name="address" placeholder="Address">
                                    </div>
                                </div>
                            </div>
                            <div class="artist-information">
                                <h3 class="ui-section">Artist information</h3>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="ui-label" for="bank_number">Bank number</label>
                                            <input type="text" class="ui-form-control" id="bank_number" name="bank_number" placeholder="Bank number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="ui-label" for="bank_name">Bank name</label>
                                            <input type="text" class="ui-form-control" id="bank_name" name="bank_name" placeholder="Bank name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="ui-label" for="bank_branch">Bank branch</label>
                                            <input type="text" class="ui-form-control" id="bank_branch" name="bank_branch" placeholder="Bank branch">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="ui-label" for="exhibition">Exhibition</label>
                                            <textarea name="exhibition" id="exhibition" cols="30" rows="5" class="ui-form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-information">
                                <h3 class="ui-section">Customer information</h3>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="ui-label" for="zipcode">Zipcode</label>
                                            <input type="text" class="ui-form-control" id="zipcode" name="zipcode" placeholder="Zipcode">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="ui-section">Description</h3>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="ui-label" for="description">Description</label>
                                        <textarea name="description" id="description" cols="30" rows="5" class="ui-form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button class="ui-btn update-btn" type="submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection