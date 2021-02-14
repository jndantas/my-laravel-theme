<template>
<div>
    <div class="section-header">
        <h1>Usuários</h1>
        <div class="section-header-button">
            <a href="#" class="btn btn-primary">Novo</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Usuários</a></div>
            <div class="breadcrumb-item">Todos Usuários</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Usuários</h2>
        <p class="section-lead">
            Você pode gerenciar todos usuários, editar, apagar e mais.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Todos <span class="badge badge-white">5</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Bloqueados <span class="badge badge-primary">1</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Todos Usuários</h4>
                    </div>
                    <div class="card-body">


                        <div class="clearfix mb-3"></div>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Avatar</th>
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th>Criado em</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#">
                                            <img alt="image" src="" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#">Web Developer</a>,
                                        <a href="#">Tutorial</a>
                                    </td>
                                    <td>Laravel 5 Tutorial: Introduction
                                        <div class="table-links">
                                            <a href="#">Ver</a>
                                            <div class="bullet"></div>
                                            <a href="#">Editar</a>
                                            <div class="bullet"></div>
                                            <a href="#" class="text-danger">Apagar</a>
                                        </div>
                                    </td>

                                    <td>2018-01-20</td>
                                    <td><div class="badge badge-primary">Ativo</div></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
