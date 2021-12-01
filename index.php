<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Reviews And Questions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">Review & Question</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <h1 class="rv-color mt-4 mb-4">
                            <b><span id="average_rating">0.0</span></b>
                        </h1>
                        <div class="mb-3">
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                        </div>
                        <span class="h5">Based on <span class="h3" id="total_review">0</span> Reviews</span>
                    </div>
                    <div class="col-sm-4">
                        <p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star rv-color"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar rv-bg-color" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
                        <p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star rv-color"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar rv-bg-color" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
                        <p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star rv-color"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar rv-bg-color" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
                        <p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star rv-color"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar rv-bg-color" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
                        <p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star rv-color"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar rv-bg-color" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
                    </div>
                    <div class="col-sm-4 text-center">
                        <button type="button" name="add_review" id="add_review" class="btn btn-outline-secondary mb-3"><i class="far fa-edit"></i> Write a Review</button>
                        <button type="button" name="add_question" id="add_question" class="btn btn-outline-secondary mb-3"><i class="far fa-comments"></i> Ask a Question</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Review & Question Tab -->
        <nav class="mt-5">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="comment-tab" data-toggle="tab" href="#comment" role="tab" aria-controls="comment" aria-selected="true">Reviews</a>
                <a class="nav-item nav-link" id="question-tab" data-toggle="tab" href="#question" role="tab" aria-controls="question" aria-selected="false">Questions<span id="count"></span></a>
            </div>
	    </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="comment" role="tabpanel" aria-labelledby="comment-tab">
                <!-- Comment start -->
                <div class="mt-5" id="review_content"></div>
                <!-- Comment end -->
            </div>
            <div class="tab-pane fade" id="question" role="tabpanel" aria-labelledby="question-tab">
                <!-- Question start -->
                <div class="container mt-5 mb-5 pl-0 pr-0">
                    <ul class="p-0" id="display_comment"></ul>
                </div>
                <!-- Question end -->
            </div>
        </div>
    </div>
    
    <!-- Question Modal -->
    <div id="question_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Submit Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form method="POST" id="comment_form">
                        <div class="form-group">
                            <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="form-group">
                            <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Write your question here" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="comment_id" id="comment_id" value="0" />
                            <input type="submit" name="submit" id="submit" class="btn btn-outline-secondary" value="Submit" />
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Review Modal -->
    <div id="review_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Submit Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center mt-2 mb-4">
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                    </h4>
                    <div class="form-group">
                        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
                    </div>
                    <div class="form-group">
                        <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                    </div>
                    <div class="form-group text-center mt-4">
                        <button type="button" class="btn btn-outline-secondary" id="save_review">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="./common.js"></script>
</body>
</html>