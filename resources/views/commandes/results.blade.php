@extends('layouts.admin')

@section('content')
<div class="container-fluid">
                        <h1 class="mt-4"></h1>
                       <div class="card mb-4">
                            <div class="card-header">
                                <a class="btn btn-info" href="">
                                    <i class="fas fa-plus"></i>
                                    Add new demande
                                </a>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>id commande</th>
                                                <th>livreur</th>
                                                <th>produit</th>
                                                <th>livraison</th>
                                                <th>client</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$commande->id ?? ''}}<br>
                                                <i class="far fa-bell"></i>
                                                        <span class="badge badge-success navbar-badge">livrée</span>
                                                </td>
                                                <td> 
                                                
                                                <i class="fa fa-user"></i>: Bilal
                                                <br>
                                                <i class="fa fa-phone"></i>: 0659439677
                                                
                                                </td>

                                                <td>                                                 
                                                    <i class="fa fa-box"></i>: produit
                                                    <br>
                                                    <i class="fa fa-money"></i>: 100
                                                 </td>

                                                <td>100 <i class="fas fa-money"></i></td>
                                                <td>                                                 
                                                    <i class="fa fa-user"></i>: ousama
                                                    <br>
                                                    <i class="fa fa-phone"></i>: 0554823354 
                                                    <br>
                                                    <i class="fa fa-map"></i>: el-harrach 
                                                 </td>
                                                <td >
                                                    <div class="table-action">  
                                                    <a  
                                                    onclick="return confirm('etes vous sure  ?')"
                                                    class="btn btn-info">
                                                            <i class="fas fa-trash"></i> Annuler 
                                                    </a>
                                                    <br>
                                                    <br>
                                                    <a 
                                                     class="btn btn-info">
                                                            <i class="fas fa-edit"></i> Modifer 
                                                    </a>
                                                    </div>
                                                </td>

                                            </tr>
                                            


                                        </tbody>
                                    </table>
                                </div>
                            </div>
 
                        </div>
                    </div>



@endsection