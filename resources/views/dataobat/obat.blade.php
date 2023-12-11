@extends('layout.mainpegawai')

@section('content')
    <style>
        .button {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 8px 12px 8px 16px;
            gap: 8px;
            height: 40px;
            width: 128px;
            border: none;
            background: #056bfa27;
            border-radius: 20px;
            cursor: pointer;
        }

        .lable {
            margin-top: 1px;
            font-size: 19px;
            line-height: 22px;
            color: #056DFA;
            font-family: sans-serif;
            letter-spacing: 1px;
        }

        .button:hover {
            background: #056bfa49;
        }

        .button:hover .svg-icon {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-8deg);
            }

            50% {
                transform: rotate(0deg);
            }

            75% {
                transform: rotate(8deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        .continue-application {
            --color: #fff;
            --background: #404660;
            --background-hover: #3A4059;
            --background-left: #2B3044;
            --folder: #F3E9CB;
            --folder-inner: #BEB393;
            --paper: #FFFFFF;
            --paper-lines: #BBC1E1;
            --paper-behind: #E1E6F9;
            --pencil-cap: #fff;
            --pencil-top: #275EFE;
            --pencil-middle: #fff;
            --pencil-bottom: #5C86FF;
            --shadow: rgba(13, 15, 25, .2);
            border: none;
            outline: none;
            cursor: pointer;
            position: relative;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
            line-height: 19px;
            -webkit-appearance: none;
            -webkit-tap-highlight-color: transparent;
            padding: 17px 29px 17px 69px;
            transition: background 0.3s;
            color: var(--color);
            background: var(--bg, var(--background));
        }

        .continue-application>div {
            top: 0;
            left: 0;
            bottom: 0;
            width: 53px;
            position: absolute;
            overflow: hidden;
            border-radius: 5px 0 0 5px;
            background: var(--background-left);
        }

        .continue-application>div .folder {
            width: 23px;
            height: 27px;
            position: absolute;
            left: 15px;
            top: 13px;
        }

        .continue-application>div .folder .top {
            left: 0;
            top: 0;
            z-index: 2;
            position: absolute;
            transform: translateX(var(--fx, 0));
            transition: transform 0.4s ease var(--fd, 0.3s);
        }

        .continue-application>div .folder .top svg {
            width: 24px;
            height: 27px;
            display: block;
            fill: var(--folder);
            transform-origin: 0 50%;
            transition: transform 0.3s ease var(--fds, 0.45s);
            transform: perspective(120px) rotateY(var(--fr, 0deg));
        }

        .continue-application>div .folder:before,
        .continue-application>div .folder:after,
        .continue-application>div .folder .paper {
            content: "";
            position: absolute;
            left: var(--l, 0);
            top: var(--t, 0);
            width: var(--w, 100%);
            height: var(--h, 100%);
            border-radius: 1px;
            background: var(--b, var(--folder-inner));
        }

        .continue-application>div .folder:before {
            box-shadow: 0 1.5px 3px var(--shadow), 0 2.5px 5px var(--shadow), 0 3.5px 7px var(--shadow);
            transform: translateX(var(--fx, 0));
            transition: transform 0.4s ease var(--fd, 0.3s);
        }

        .continue-application>div .folder:after,
        .continue-application>div .folder .paper {
            --l: 1px;
            --t: 1px;
            --w: 21px;
            --h: 25px;
            --b: var(--paper-behind);
        }

        .continue-application>div .folder:after {
            transform: translate(var(--pbx, 0), var(--pby, 0));
            transition: transform 0.4s ease var(--pbd, 0s);
        }

        .continue-application>div .folder .paper {
            z-index: 1;
            --b: var(--paper);
        }

        .continue-application>div .folder .paper:before,
        .continue-application>div .folder .paper:after {
            content: "";
            width: var(--wp, 14px);
            height: 2px;
            border-radius: 1px;
            transform: scaleY(0.5);
            left: 3px;
            top: var(--tp, 3px);
            position: absolute;
            background: var(--paper-lines);
            box-shadow: 0 12px 0 0 var(--paper-lines), 0 24px 0 0 var(--paper-lines);
        }

        .continue-application>div .folder .paper:after {
            --tp: 6px;
            --wp: 10px;
        }

        .continue-application>div .pencil {
            height: 2px;
            width: 3px;
            border-radius: 1px 1px 0 0;
            top: 8px;
            left: 105%;
            position: absolute;
            z-index: 3;
            transform-origin: 50% 19px;
            background: var(--pencil-cap);
            transform: translateX(var(--pex, 0)) rotate(35deg);
            transition: transform 0.4s ease var(--pbd, 0s);
        }

        .continue-application>div .pencil:before,
        .continue-application>div .pencil:after {
            content: "";
            position: absolute;
            display: block;
            background: var(--b, linear-gradient(var(--pencil-top) 55%, var(--pencil-middle) 55.1%, var(--pencil-middle) 60%, var(--pencil-bottom) 60.1%));
            width: var(--w, 5px);
            height: var(--h, 20px);
            border-radius: var(--br, 2px 2px 0 0);
            top: var(--t, 2px);
            left: var(--l, -1px);
        }

        .continue-application>div .pencil:before {
            -webkit-clip-path: polygon(0 5%, 5px 5%, 5px 17px, 50% 20px, 0 17px);
            clip-path: polygon(0 5%, 5px 5%, 5px 17px, 50% 20px, 0 17px);
        }

        .continue-application>div .pencil:after {
            --b: none;
            --w: 3px;
            --h: 6px;
            --br: 0 2px 1px 0;
            --t: 3px;
            --l: 3px;
            border-top: 1px solid var(--pencil-top);
            border-right: 1px solid var(--pencil-top);
        }

        .continue-application:before,
        .continue-application:after {
            content: "";
            position: absolute;
            width: 10px;
            height: 2px;
            border-radius: 1px;
            background: var(--color);
            transform-origin: 9px 1px;
            transform: translateX(var(--cx, 0)) scale(0.5) rotate(var(--r, -45deg));
            top: 26px;
            right: 16px;
            transition: transform 0.3s;
        }

        .continue-application:after {
            --r: 45deg;
        }

        .continue-application:hover {
            --cx: 2px;
            --bg: var(--background-hover);
            --fx: -40px;
            --fr: -60deg;
            --fd: .15s;
            --fds: 0s;
            --pbx: 3px;
            --pby: -3px;
            --pbd: .15s;
            --pex: -24px;
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
        Data Obat Aposeh
    </h2>

    <!-- New Table -->
    <div iv class="w-full overflow-hidden rounded-lg shadow-xs" style="margin-top: 40px">
        <div class="w-full overflow-x-auto">
            <a href="/obat/create"
                style="display: flex; justify-content: center; margin-top: 10px;margin-bottom: 10px"><button
                    class="continue-application">
                    <div>
                        <div class="pencil"></div>
                        <div class="folder">
                            <div class="top">
                                <svg viewBox="0 0 24 27">
                                    <path
                                        d="M1,0 L23,0 C23.5522847,-1.01453063e-16 24,0.44771525 24,1 L24,8.17157288 C24,8.70200585 23.7892863,9.21071368 23.4142136,9.58578644 L20.5857864,12.4142136 C20.2107137,12.7892863 20,13.2979941 20,13.8284271 L20,26 C20,26.5522847 19.5522847,27 19,27 L1,27 C0.44771525,27 6.76353751e-17,26.5522847 0,26 L0,1 C-6.76353751e-17,0.44771525 0.44771525,1.01453063e-16 1,0 Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="paper"></div>
                        </div>
                    </div>
                    Buat Data Obat
                </button></a>
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
                                @if ($o->statusobat == 'Aktif')
                <tbody>
                    <tr>
                        <td>{{ $o->id }}</td>
                        <td>{{ $o->namaobat }}</td>
                        <td>{{ $o->tglpesan }}</td>
                        <td>{{ $o->kuantitas }}</td>
                        <td>{{ $o->massa }}</td>
                        <td>{{ $o->kategori }}</td>
                        <td>{{ $o->statuskonsum }}</td>
                        <td>
                            <div class="badge badge-outline-success">
                                {{ $o->statusobat }}</div>
                        </td>
                        <td><a href="/obat/{{ $o->id }}/edit">
                                <button class="Btn" style="margin-top: 10px;height: 35px">Edit
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
                        </td>
                    </tr>
                    @endif
                    @endforeach


                </tbody>
            </table>
        </div>
        <a href="/obat/riwayat" style="display: flex; justify-content: center; margin-top: 30px;margin-bottom: 30px">
            <button class="button" style="width:200px ">
                <svg class="svg-icon" width="24" viewBox="0 0 24 24" height="24" fill="none"><g stroke-width="2" stroke-linecap="round" stroke="#056dfa" fill-rule="evenodd" clip-rule="evenodd"><path d="m3 7h17c.5523 0 1 .44772 1 1v11c0 .5523-.4477 1-1 1h-16c-.55228 0-1-.4477-1-1z"></path><path d="m3 4.5c0-.27614.22386-.5.5-.5h6.29289c.13261 0 .25981.05268.35351.14645l2.8536 2.85355h-10z"></path></g></svg>
                <span class="lable" style="font-size: 15px">Arsip Data Obat</span>
              </button>
        </a>
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
