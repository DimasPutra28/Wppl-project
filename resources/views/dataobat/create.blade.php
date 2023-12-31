@extends('layout.mainpegawai')

@section('content')

<style>
    .box {
  width: 140px;
  height: auto;
  float: left;
  transition: .5s linear;
  position: relative;
  display: block;
  overflow: hidden;
  padding: 15px;
  text-align: center;
  margin: 0 5px;
  background: transparent;
  text-transform: uppercase;
  font-weight: 900;
}

.box:before {
  position: absolute;
  content: '';
  left: 0;
  bottom: 0;
  height: 4px;
  width: 100%;
  border-bottom: 4px solid transparent;
  border-left: 4px solid transparent;
  box-sizing: border-box;
  transform: translateX(100%);
}

.box:after {
  position: absolute;
  content: '';
  top: 0;
  left: 0;
  width: 100%;
  height: 4px;
  border-top: 4px solid transparent;
  border-right: 4px solid transparent;
  box-sizing: border-box;
  transform: translateX(-100%);
}

.box:hover {
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
}

.box:hover:before {
  border-color: #262626;
  height: 100%;
  transform: translateX(0);
  transition: .3s transform linear, .3s height linear .3s;
}

.box:hover:after {
  border-color: #262626;
  height: 100%;
  transform: translateX(0);
  transition: .3s transform linear, .3s height linear .5s;
}

button {
  color: black;
  text-decoration: none;
  cursor: pointer;
  outline: none;
  border: none;
  background: transparent;
}
</style>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Data Obat Aposeh
    </h2>

    <!-- New Table -->
    <div  class="w-full overflow-hidden rounded-lg shadow-xs" style="margin-top: 40px">
        <div class="w-full overflow-x-auto">
            {{-- <h4 class="card-title" style="color: black; text-align: center">INPUT DATA OBAT
                                    APOSEH --}}
            </h4>
            <div class="row mb-1">
                <form action="/obat/store" method="POST">
                    @csrf
                    {{-- <div class="col-lg-2">
                                        <label for="" style=" font-size: 15px;color: black">id</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" name=""
                                            style="border: 2px solid #AAC4FF;margin-bottom: 10px;background-color: white"
                                            class="form-control" placeholder="">
                                    </div> --}}
                    <div class="col-lg-2">
                        <label for="" style=" font-size: 15px;color: black">Nama
                            Obat</label>
                    </div>
                    <div class="col-lg-10">
                        <input  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" name="namaobat"
                            style="border: 2px solid #000000;margin-bottom: 10px;background-color: white"
                            class="form-control" placeholder="Nama Obat">
                    </div>
                    <div class="col-lg-2">
                        <label for="" style=" font-size: 15px;color: black">Tanggal
                            Dipesan</label>
                    </div>
                    <div class="col-lg-10">
                        <input  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="date" name="tglpesan"
                            style="border: 2px solid #000000;margin-bottom: 10px;background-color: white"
                            class="form-control" placeholder="dd/mm/yyyy">
                    </div>
                    <div class="col-lg-2">
                        <label for="" style=" font-size: 15px;color: black">Kuantitas</label>
                    </div>
                    <div class="col-lg-10">
                        <input  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" name="kuantitas"
                            style="border: 2px solid #000000;margin-bottom: 10px;background-color: white"
                            class="form-control" placeholder="Kuantitas">
                    </div>
                    <div class="col-lg-2">
                        <label for="" style=" font-size: 15px;color: black">Massa</label>
                    </div>
                    <div class="col-lg-10">
                        <input  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" name="massa"
                            style="border: 2px solid #000000;margin-bottom: 10px;background-color: white"
                            class="form-control" placeholder="Massa">
                    </div>
                    <div class="col-lg-2">
                        <label for="" style=" font-size: 15px;color: black">Kategori</label>
                    </div>
                    <div class="col-lg-10">
                        <input  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" name="kategori"
                            style="border: 2px solid #000000;margin-bottom: 10px;background-color: white"
                            class="form-control" placeholder="Kategori">
                    </div>
                    <div class="col-lg-2">
                        <label for="" style=" font-size: 15px;color: black">Status
                            Konsumsi</label>
                    </div>
                    <div class="col-lg-10">
                        <input  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" name="statuskonsum"
                            style="border: 2px solid #000000;margin-bottom: 10px;background-color: white"
                            class="form-control" placeholder="Status Konsumsi">
                    </div>
                    <div class="col-lg-2">
                        <label for="" style=" font-size: 15px;color: black">Status
                            Obat</label>
                    </div>
                    <div class="col-lg-10">
                        <select class="form-select" name="statusobat" style="border: 3px solid #000000;margin-bottom: 10px"
                            aria-label="Default select example">
                            <option disabled="disabled" selected="selected">Status Obat</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <button style="margin: 20px">
                        <span class="box">
                            <input  type="submit" name="submit" value="SIMPAN">
                        </span>
                    </button>

                </form>

            </div>
        </div>

        <!-- Charts -->
        {{-- <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Charts
    </h2>
    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Revenue
            </h4>
            <canvas id="pie"></canvas>
            <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                <!-- Chart legend -->
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
                    <span>Shirts</span>
                </div>
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                    <span>Shoes</span>
                </div>
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                    <span>Bags</span>
                </div>
            </div>
        </div>
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Traffic
            </h4>
            <canvas id="line"></canvas>
            <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                <!-- Chart legend -->
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                    <span>Organic</span>
                </div>
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                    <span>Paid</span>
                </div>
            </div>
        </div>
    </div> --}}
    </div>
@endsection
