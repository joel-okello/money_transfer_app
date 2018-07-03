
@extends('layouts.template')
@section('content')
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Amount</th>
                  <th>Account Name</th>
                  <th>Date of Transaction</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Amount</th>
                  <th>Account Name</th>
                  <th>Date of Transaction</th>
                </tr>
              </tfoot>
              <tbody>
               
                <tr>
                  <td>OKello</td>
                  <td>Joel Acaye</td>
                  <td>40000</td>
                  <td>Mobile Money</td>
                  <td>12/12/2018</td>
                </tr>
               
                
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      @endsection