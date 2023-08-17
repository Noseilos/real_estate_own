<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') </title>
    @vite(['resources/js/app.js'])

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('frontend/assets/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/color/orange.css') }}" id="jssDefault" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/switcher-style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">

    {{-- Toaster css --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">


        <!-- preloader -->
        @include('frontend.home.preloader')
        <!-- preloader end -->


        <!-- switcher menu -->

        <!-- end switcher menu -->


        <!-- main header -->
        @include('frontend.home.header')
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        @include('frontend.home.mobile_menu')
        <!-- End Mobile Menu -->

        @yield('main')

        <!-- main-footer -->
        @include('frontend.home.footer')
        <!-- main-footer end -->



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/validation.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/appear.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jQuery.style.switcher.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/nav-tool.js') }}"></script>

    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="{{ asset('frontend/assets/js/gmaps.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/map-helper.js') }}"></script>

    <!-- main-js -->
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>

    {{-- Toaster --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
    {{-- End Toaster --}}

    {{-- Add to Wishlist --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!--  // Start Load MY Cart // -->
    <script type="text/javascript">
        function cart() {
            $.ajax({
                type: 'GET',
                url: '/get-cart-product',
                dataType: 'json',
                success: function(response) {
                    // console.log(response)

                    var rows = ""
                    $.each(response.carts, function(key, value) {
                        rows += `<tr class="pt-30">
           <td class="custome-checkbox pl-30">
                
           </td>
           <td class="image product-thumbnail pt-40"><img src="/${value.options.image} " alt="#"></td>
           <td class="product-des product-name">
               <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">${value.name} </a></h6>
               
           </td>
           <td class="price" data-title="Price">
               <h4 class="text-body">₱${value.price} </h4>
           </td>
             <td class="price" data-title="Price">
             ${value.options.color == null
               ? `<span>.... </span>`
               : `<h6 class="text-body">${value.options.color} </h6>`
             } 
           </td>
              <td class="price" data-title="Price">
             ${value.options.size == null
               ? `<span>.... </span>`
               : `<h6 class="text-body">${value.options.size} </h6>`
             } 
           </td>
           <td class="text-center detail-info" data-title="Stock">
               <div class="detail-extralink mr-15">
                   <div class="detail-qty border radius">
                    <a type="submit" class="qty-down" id="${value.rowId}" onclick="cartDecrement(this.id)"><i class="fi-rs-angle-small-down"></i></a>
                      
                    <input type="text" name="quantity" class="qty-val" value="${value.qty}" min="1">
                    <a  type="submit" class="qty-up" id="${value.rowId}" onclick="cartIncrement(this.id)"><i class="fi-rs-angle-small-up"></i></a>
                   </div>
               </div>
           </td>
           <td class="price" data-title="Price">
               <h4 class="text-brand">₱${value.subtotal} </h4>
           </td>
           <td class="action text-center" data-title="Remove">
            <a type="submit" class="text-body"  id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fi-rs-trash"></i></a></td>
       </tr>`
                    });
                    $('#cartPage').html(rows);
                }
            })
        }
        cart();

        // Cart Remove Start 
        function cartRemove(id) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/cart-remove/" + id,
                success: function(data) {
                    cart();
                    miniCart();
                    couponCalculation();
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message  
                }
            })
        }
        // Cart Remove End 
    </script>
    <!--  // End Load MY Cart // -->

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })


        /// Start Add To Cart Prodcut 
        function addToCart() {
            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var vendor = $('#pvendor_id').text();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name,
                    vendor: vendor,
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    miniCart();
                    $('#closeModal').click();
                    // console.log(data)
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }
                    // End Message  
                }
            })
        }

        /// End Add To Cart Product 

        /// Start Details Page Add To Cart Product 
        function addToCartDetails() {
            var product_name = $('#dpname').text();
            var id = $('#dproduct_id').val();
            var vendor = $('#vproduct_id').val();
            var color = $('#dcolor option:selected').text();
            var size = $('#dsize option:selected').text();
            var quantity = $('#dqty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name,
                    vendor: vendor,
                },
                url: "/dcart/data/store/" + id,
                success: function(data) {
                    miniCart();

                    // console.log(data)
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }
                    // End Message  
                }
            })
        }
        /// Eend Details Page Add To Cart Product 
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function addToWishlist(property_id) {

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishlist/" + property_id,

                success: function(data) {

                    wishlist();

                    // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message  

                }
            })
        }
    </script>
    {{-- End Add to Wishlist --}}

    {{-- Load wishlist data --}}
    <script>
        function wishlist() {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/get-wishlist-property",

                success: function(response) {

                    $('#wishQuantity').text(response.wishQuantity);

                    var rows = ""
                    $.each(response.wishlist, function(key, value) {

                        rows += `<div class="deals-block-one">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="/${value.property.property_thumbnail}" alt=""></figure>
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">Featured</span>
                                    <div class="buy-btn"><a href="#">For ${value.property.property_status}</a></div>
                                </div>
                                <div class="lower-content">
                                    <div class="title-text"><h4><a href="">${value.property.property_name}</a></h4></div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>Start From</h6>
                                            <h4>$${value.property.lowest_price}</h4>
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>${value.property.bedrooms} Beds</li>
                                        <li><i class="icon-15"></i>${value.property.bathrooms} Baths</li>
                                        <li><i class="icon-16"></i>${value.property.property_size} Sq Ft</li>
                                    </ul>
                                    <div class="other-info-box clearfix">

                                        <ul class="other-option pull-right clearfix">
                                            <li><a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fa fa-trash"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>`

                    });

                    $('#wishlist').html(rows);

                }
            })
        }

        wishlist();


        // Wishlist Remove

        function wishlistRemove(id) {

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/wishlist-remove/" + id,

                success: function(data) {

                    wishlist();

                    // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message  

                }
            })

        }

        // End Wishlist Remove
    </script>
    {{-- End Load wishlist data --}}

    {{-- Add to Compare --}}
    <script>
        function addToCompare(property_id) {

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-compare/" + property_id,

                success: function(data) {

                    wishlist();

                    // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message  

                }
            })
        }
    </script>
    {{-- End Add to Compare --}}

    {{-- Load compare data --}}
    <script>
        function compare() {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/get-compare-property",

                success: function(response) {

                    var rows = ""
                    $.each(response, function(key, value) {

                        rows += `<tr>
                            <th>Property Info</th>
                            <th>
                                <figure class="image-box"><img src="/${value.property.property_thumbnail}" alt=""></figure>
                                <div class="title">${value.property.property_name}</div>
                                <div class="price">$${value.property.lowest_price}</div>
                            </th>
                            
                        </tr>
                        
                        <tr>
                            <td>
                                <p>City</p>
                            </td>
                            <td>
                                <p>${value.property.city}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Area</p>
                            </td>
                            <td>
                                <p>${value.property.property_size} Sq Ft</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Rooms</p>
                            </td>
                            <td>
                                <p>${value.property.bedrooms}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Bathrooms</p>
                            </td>
                            <td>
                                <p>${value.property.bathrooms}</p>
                            </td>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <p>Action</p>
                            </td>
                            <td>
                                <a type="submit" class="text-body" id="${value.id}" onclick="compareRemove(this.id)" ><i class="fa fa-trash"></i></a>
                            </td>
                            <td>
                        </tr>`

                    });

                    $('#compare').html(rows);

                }
            })
        }

        compare();


        // Compare Remove

        function compareRemove(id) {

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/compare-remove/" + id,

                success: function(data) {

                    compare();

                    // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message  

                }
            })

        }

        // End Compare Remove
    </script>
    {{-- End Load compare data --}}

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    {{-- End bootstrap --}}

</body><!-- End of .page_wrapper -->

</html>
