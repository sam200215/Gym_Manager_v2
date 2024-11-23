
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Fila de Tarjetas de Resumen -->
    <div class="row mb-4">
        <!-- Clientes Activos -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-primary border-4 shadow h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-uppercase fw-bold text-primary mb-1">Clientes Activos</div>
                            <div class="h4 mb-0 fw-bold">{{ $clientesActivos }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Membresías Activas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-success border-4 shadow h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-uppercase fw-bold text-success mb-1">Membresías Activas</div>
                            <div class="h4 mb-0 fw-bold">{{ $membresiasActivas }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-id-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ingresos del Mes -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-info border-4 shadow h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-uppercase fw-bold text-info mb-1">Ingresos del Mes</div>
                            <div class="h4 mb-0 fw-bold">L. {{ number_format($ingresosMes, 2) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficos -->
    <div class="row">
        <!-- Gráfico de Membresías -->
        <div class="col-xl-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-primary">Membresías por Tipo</h6>
                </div>
                <div class="card-body">
                    <div id="membresiasChart"></div>
                </div>
            </div>
        </div>

        <!-- Gráfico de Ingresos -->
        <div class="col-xl-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-primary">Ingresos Mensuales</h6>
                </div>
                <div class="card-body">
                    <div id="ingresosChart"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gráfico de Membresías
    const membresiasOptions = {
        series: [{
            data: @json($membresiasData)
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: true,
            }
        },
        colors: ['#4e73df'],
        xaxis: {
            categories: @json($membresiasLabels)
        }
    };

    new ApexCharts(document.querySelector("#membresiasChart"), membresiasOptions).render();

    // Gráfico de Ingresos
    const ingresosOptions = {
        series: [{
            name: 'Ingresos',
            data: @json($ingresosData)
        }],
        chart: {
            type: 'area',
            height: 350
        },
        colors: ['#36b9cc'],
        xaxis: {
            categories: @json($meses)
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return 'L. ' + val.toFixed(2)
                }
            }
        }
    };

    new ApexCharts(document.querySelector("#ingresosChart"), ingresosOptions).render();
});
</script>
@endpush
@endsection