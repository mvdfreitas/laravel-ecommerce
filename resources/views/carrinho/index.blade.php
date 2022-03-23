@extends('template-site.master')

@section('content')
        <section class="container" id="order" style="margin-top: 50px">

            <h2 class="title-doc"># Order </h2>


            <h4 class="subtitle-doc"># Shopping cart
                <a href="#" data-html="code_cart" class="showcode">[code]</a>
            </h4>
            <div id="code_cart">
                <div class="card">
                    <table class="table table-hover shopping-cart-wrap">
                        <thead class="text-muted">
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col" width="120">Quantity</th>
                                <th scope="col" width="120">Price</th>
                                <th scope="col" width="200" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <figure class="media">
                                        <div class="img-wrap"><img src="images/items/1.jpg" class="img-thumbnail img-sm"></div>
                                        <figcaption class="media-body">
                                            <h6 class="title text-truncate">Product name goes here </h6>
                                            <dl class="dlist-inline small">
                                                <dt>Size: </dt>
                                                <dd>XXL</dd>
                                            </dl>
                                            <dl class="dlist-inline small">
                                                <dt>Color: </dt>
                                                <dd>Orange color</dd>
                                            </dl>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="price-wrap">
                                        <var class="price">USD 145</var>
                                        <small class="text-muted">(USD5 each)</small>
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td class="text-right">
                                    <a title="" href="" class="btn btn-outline-success" data-toggle="tooltip"
                                        data-original-title="Save to Wishlist"> <i class="fa fa-heart"></i></a>
                                    <a href="" class="btn btn-outline-danger"> × Remove</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <figure class="media">
                                        <div class="img-wrap"><img src="images/items/2.jpg" class="img-thumbnail img-sm"></div>
                                        <figcaption class="media-body">
                                            <h6 class="title text-truncate">Product name goes here </h6>
                                            <dl class="dlist-inline small">
                                                <dt>Size: </dt>
                                                <dd>XXL</dd>
                                            </dl>
                                            <dl class="dlist-inline small">
                                                <dt>Color: </dt>
                                                <dd>Orange color</dd>
                                            </dl>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="price-wrap">
                                        <var class="price">USD 35</var>
                                        <small class="text-muted">(USD10 each)</small>
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td class="text-right">
                                    <a title="" href="" class="btn btn-outline-success" data-toggle="tooltip"
                                        data-original-title="Save to Wishlist"> <i class="fa fa-heart"></i></a>
                                    <a href="" class="btn btn-outline-danger btn-round"> × Remove</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <figure class="media">
                                        <div class="img-wrap"><img src="images/items/3.jpg" class="img-thumbnail img-sm"></div>
                                        <figcaption class="media-body">
                                            <h6 class="title text-truncate">Product name goes here </h6>
                                            <dl class="dlist-inline small">
                                                <dt>Size: </dt>
                                                <dd>XXL</dd>
                                            </dl>
                                            <dl class="dlist-inline small">
                                                <dt>Color: </dt>
                                                <dd>Orange color</dd>
                                            </dl>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="price-wrap">
                                        <var class="price">USD 45</var>
                                        <small class="text-muted">(USD15 each)</small>
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td class="text-right">
                                    <a title="" href="" class="btn btn-outline-success" data-toggle="tooltip"
                                        data-original-title="Save to Wishlist"> <i class="fa fa-heart"></i></a>
                                    <a href="" class="btn btn-outline-danger btn-round"> × Remove</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- card.// -->
            </div> <!-- code-wrap.// -->
        </section>
        <br />
        <br />
        <section class="container">
            <div class="row">
                <aside class="col-md-4">
                    <h4 class="subtitle-doc"># Cálculo de frete
                        <a href="#" data-html="code_desc_simple" class="showcode">[code]</a>
                    </h4>
                    <div id="code_desc_simple">
                        <div class="box">
                            <dl>
                                <dt>Some info: </dt>
                                <dd> Dolor sit amet, consectetur adipisicing elit do eiusmod
                                    tempor incididunt</dd>
                            </dl>
                            <dl>
                                <dt>Parameter: </dt>
                                <dd>Value name</dd>
                            </dl>
                            <dl>
                                <dt>Discount:</dt>
                                <dd>USD 658</dd>
                            </dl>
                        </div> <!-- box.// -->
                    </div> <!-- code-wrap.// -->
                </aside>
                <aside class="col-md-4">
                    <h4 class="subtitle-doc"># Cupom desconto
                        <a href="#" data-html="code_desc_align" class="showcode">[code]</a>
                    </h4>
                    <div id="code_desc_align">
                        <div class="box">
                            <dl class="dlist-align">
                                <dt>Some info: </dt>
                                <dd> Everything in this life is always tempporary</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Parameter: </dt>
                                <dd>Value name</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Color:</dt>
                                <dd>Orange and Black</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Material:</dt>
                                <dd>Leather</dd>
                            </dl>
                        </div> <!-- box.// -->
                    </div> <!-- code-wrap.// -->
                </aside>
                <aside class="col-md-4">
                    <h4 class="subtitle-doc"># Total a pagar
                        <a href="#" data-html="code_desc_right" class="showcode">[code]</a>
                    </h4>
                    <div id="code_desc_right">
                        <div class="box">
                            <dl class="dlist-align">
                                <dt>Parameter: </dt>
                                <dd class="text-right">Value name</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Color:</dt>
                                <dd class="text-right">Orange and Black</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Material:</dt>
                                <dd class="text-right">Leather</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Total cost: </dt>
                                <dd class="text-right h5 b"> USD195 </dd>
                            </dl>
                        </div> <!-- box.// -->
                    </div> <!-- code-wrap.// -->
                </aside>
            </div>
        </section>
@endsection
