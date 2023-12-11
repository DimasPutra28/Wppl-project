@extends('layout.mainpegawai')

@section('content')
    <style>
        .buttonDownload {
            display: inline-block;
            position: relative;
            padding: 10px 25px;
            background-color: #4CC713;
            color: white;
            font-family: sans-serif;
            text-decoration: none;
            font-size: 0.9em;
            text-align: center;
            text-indent: 15px;
            border: none;
        }

        .buttonDownload:hover {
            background-color: #45a21a;
            color: white;
        }

        .buttonDownload:before,
        .buttonDownload:after {
            content: ' ';
            display: block;
            position: absolute;
            left: 15px;
            top: 52%;
        }

        .buttonDownload:before {
            width: 10px;
            height: 2px;
            border-style: solid;
            border-width: 0 2px 2px;
        }

        .buttonDownload:after {
            width: 0;
            height: 0;
            margin-left: 3px;
            margin-top: -7px;
            border-style: solid;
            border-width: 4px 4px 0 4px;
            border-color: transparent;
            border-top-color: inherit;
            animation: downloadArrow 1s linear infinite;
            animation-play-state: paused;
        }

        .buttonDownload:hover:before {
            border-color: #cdefbd;
        }

        .buttonDownload:hover:after {
            border-top-color: #cdefbd;
            animation-play-state: running;
        }

        @keyframes downloadArrow {
            0% {
                margin-top: -7px;
                opacity: 1;
            }

            0.001% {
                margin-top: -15px;
                opacity: 0.4;
            }

            50% {
                opacity: 1;
            }

            100% {
                margin-top: 0;
                opacity: 0.4;
            }
        }

        .Btn {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 100px;
            height: 40px;
            border: none;
            padding: 0px 20px;
            background-color: rgb(168, 38, 255);
            color: white;
            font-weight: 500;
            cursor: pointer;
            border-radius: 10px;
            box-shadow: 5px 5px 0px rgb(140, 32, 212);
            transition-duration: .3s;
        }

        .svg {
            width: 13px;
            position: absolute;
            right: 0;
            margin-right: 20px;
            fill: white;
            transition-duration: .3s;
        }

        .Btn:hover {
            color: transparent;
        }

        .Btn:hover svg {
            right: 43%;
            margin: 0;
            padding: 0;
            border: none;
            transition-duration: .3s;
        }

        .Btn:active {
            transform: translate(3px, 3px);
            transition-duration: .3s;
            box-shadow: 2px 2px 0px rgb(140, 32, 212);
        }
    </style>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Riwayat Data Obat
    </h2>

    <!-- New Table -->
    <div iv class="w-full overflow-hidden rounded-lg shadow-xs" style="margin-top: 40px">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                        <th class="px-4 py-3"> id </th>
                        <th class="px-4 py-3"> Nama Obat </th>
                        <th class="px-4 py-3"> Tanggal Dipesan </th>
                        <th class="px-4 py-3"> Kuantitas </th>
                        <th class="px-4 py-3"> Massa </th>
                        <th class="px-4 py-3"> Kategori Obat </th>
                        <th class="px-4 py-3"> Status Konsumsi </th>
                        <th class="px-4 py-3"> Status Obat </th>
                        <th class="px-4 py-3"> Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                {{-- <div
              class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
            > --}}
                                {{-- <img
                class="object-cover w-full h-full rounded-full"
                src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                alt=""
                loading="lazy"
              />
              <div
                class="absolute inset-0 rounded-full shadow-inner"
                aria-hidden="true"
              ></div> --}}
                            </div>
                            @foreach ($obat as $o)
                                {{-- @if ($o->statusobat == 'Aktif') --}}
                <tbody>
                    <tr>
                        <td  >{{ $o->id }}</td>
                        <td>{{ $o->namaobat }}</td>
                        <td>{{ $o->tglpesan }}</td>
                        <td>{{ $o->kuantitas }}</td>
                        <td>{{ $o->massa }}</td>
                        <td>{{ $o->kategori }}</td>
                        <td>{{ $o->statuskonsum }}</td>
                        <td class="badge badge-outline" style="display: flex; justify-content: center;">

                            {{ $o->statusobat }}
                        </td>
                        <td><a href="/obat/{{ $o->id }}/edit">
                                <button class="Btn" style="margin-top: 10px">Edit
                                    <svg class="svg" viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                        </path>
                                    </svg>
                                </button>
                            </a>
                            {{-- <form action="/obat/{{ $o->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" name="submit" value="delete">
                                            </form> --}}
                        {{-- </td> --}}
                    </tr>
                    {{-- @endif --}}
                    @endforeach



                </tbody>
                <a href="/obat/riwayat/cetak" target="_blank" style="display: flex; justify-content: center;margin: 10px">
                    <button class="buttonDownload">SAVE PDF</button></a>
            </table>
        </div>

        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3">
                Showing 21-30 of 100
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                        <li>
                            <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                aria-label="Previous">
                                <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                1
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                2
                            </button>
                        </li>
                        <li>
                            <button
                                class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                                3
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                4
                            </button>
                        </li>
                        <li>
                            <span class="px-3 py-1">...</span>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                8
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                9
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                aria-label="Next">
                                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                    <path
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </button>
                        </li>
                    </ul>
                </nav>
            </span>
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
