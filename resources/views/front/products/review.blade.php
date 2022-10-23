
<div class="modal fade in product-rate" id="new_comment_form" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center"><i class="fa fa-edit"></i>{{__('front.Write your review !')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons close">close</i>
                </button>
            </div>
            <div class="modal-body">
                <form id="new_review" class="new_review" action="{{route('review.store')}}">
                    @csrf
                    <div class="new_comment_form_content">
                        <div id="new_comment_form_error" class="error alert alert-danger">
                            <ul></ul>
                        </div>
                        <div class="container d-flex justify-content-center ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <span class="myratings">5</span>
                                            <h4 class="mt-1">{{__('front.Rate')}}</h4>

                                            <fieldset class="rating d-flex justify-content-center flex-row-reverse">
                                                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                                <input type="radio" class="reset-option" name="rating" value="reset" />
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <label for="content">{{__('front.Your review')}}<sup class="required">*</sup></label>
                        <textarea id="content" name="comment"></textarea>

                        <div id="new_comment_form_footer">
                            <input id="id_product_comment_send" name="product_id" type="hidden" value='{{$product->id}}'/>
                            <div class="fl"><sup class="required">*</sup>{{__('front.Required fields')}}</div>
                            <div class="fr">

                                <button type="submit" class="btn btn-primary" >{{__('front.send')}}</button>
                            </div>
                        </div>
                    </div>
                </form><!-- /end new_comment_form_content -->
            </div>
        </div>
    </div>
</div>
