<section class="all-vehicles-section px-3">



<div class="chart-mem">
    <div class="chart-wrapper px-3 pb-3">
    <div class="bg-light db-chart px-3 py-3 mt-4" style=" border-radius: 10px; width: 100%; ">
        <h5><strong>Sales Reports</strong></h5>
        <canvas id="chartSales" style=" margin: 0; padding: 0;"></canvas>

        <select id="display-selector">
        <option value="day" selected>Daily</option>
        <option value="week">Weekly</option>
        <option value="month" >Monthly</option>
        <option value="year" >Year</option>
        </select>

        <select id="chart-type-selector" onchange="chartType(this.value)">
        <option value="bar" selected>Bar Chart</option>
        <option value="line">Line Chart</option>
        </select>
    </div>
    </div>

</div>






</section>




