@push('style')
    <style>
        .feather {
            width: 18px;
            height: 18px;
        }
    </style>
@endpush

<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fe-users font-22 avatar-title text-primary"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="mt-1"><span data-plugin="counterup">{{ $voter }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Voters</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                            <i class="fe-award font-22 avatar-title text-success"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $candidate }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Candidates</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                            <i class="fe-server font-22 avatar-title text-info"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $position }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Positions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                            <i class="fe-bar-chart-2 font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $vote }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Votes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Polling Chart Start -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div id="poling-chart"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Polling Chart End -->
  </div>

</div>

@push('script')
<script>
  setInterval(() => Livewire.emit('updateChart'), 3000);
  const colors = ["#1abc9c", "#4fc6e1"];
  const chartDatas = JSON.parse(`<?php echo $charts ?>`);

  const options = {
            series: [
                {
                    name: "Hasil Poling",
                    data: chartDatas.datas,
                },
            ],
            chart: {
                height: 350,
                type: "bar",
            },
            colors: colors,
            plotOptions: {
                bar: {
                    columnWidth: "45%",
                    distributed: true,
                },
            },
            dataLabels: {
                enabled: true,
            },
            legend: {
                show: false,
            },
            xaxis: {
                categories: chartDatas.names,
                labels: {
                    style: {
                        colors: colors,
                        fontSize: "12px",
                    },
                },
            },
  };

  let chart = new ApexCharts(
      document.querySelector("#poling-chart"),
      options
  );
  chart.render();

  Livewire.on('chartUpdated', (event) => {
    let chartData = JSON.parse(event.data)
    chart.updateOptions({
      series: [
        {
            data: chartData.datas,
        },
      ],
      xaxis: {
          categories: chartData.names,
      },
    });
  });
</script>
@endpush