@extends('layouts.app')
@section('content')

<div class="inner">
    <div class="left">
        <div class="icon"><i class="fab fa-twitter"></i></div>
        <ul class="list-entire">
            <li><i class="fas fa-home"></i>Home</li>
            <a href="timeline.php"><li><i class="fas fa-hashtag"></i>Explore</li></a>
            <li><i class="far fa-bell"></i>Notifications</li>
            <li><i class="far fa-envelope"></i>Messages</li>
            <li><i class="far fa-bookmark"></i>Bookmarks</li>
            <li><i class="far fa-list-alt"></i>Lists</li>
            <li><i class="fas fa-user-alt"></i>Profile</li>
            <li class="settings-action"><i class="fas fa-sliders-h"></i>Settings</li>
        </ul>
        
        <div class="tweet">
            <a href="#">Tweet</a>
        </div>
        
        <div class="popup">
            <div class="popup-form">
                <form method="POST" action="{{ url('tweets') }}">
                    {{ csrf_field() }}
                    <div class="popup-top">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="popup-middle">
                        <img src="{{ asset('img/pika.png', true) }}">
                        <textarea name="tweet" id="tweeting" cols="30" rows="7" placeholder="What's happening?"></textarea>
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                    </div>
                    <div class="popup-bottom">
                        <div class="logo">
                            <i class="far fa-image"></i>
                            <i class="fab fa-github"></i>
                            <i class="fas fa-poll"></i>
                            <i class="far fa-smile"></i>
                            <i class="fas fa-business-time"></i>
                        </div>
                        <div class="cnt_area"><span class="now_cnt">0</span> / 140</div>
                        <input type="submit" value="Tweet" id="submit-tweet">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="center">
        <div class="center-fixed">
            <div class="arrow">
                <a href="javascript:history.back();"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
        <div class="center-profile">
            <div class="center-background">
                <img src="{{ asset('img/pikachu.jpg', true) }}">
            </div>
            <div class="center-pic">
                <img src="{{ asset('img/pika.png', true) }}">
                <a href="#" class="settings-action">Edit profile</a>

            </div>
            <div class="profile-box">
                <div class="profile-name">
                    <h3>{{ Auth::user()->name }}</h3>
                </div>
                <div class="profile-tagline">
                    <p>テキストテキストテキスト</p>
                </div>
                <div class="profile-info">
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i>Tokyo-to, Japan</li>
                        <li><i class="fas fa-link"></i>link.co.jp</li>
                        <li><i class="fas fa-golf-ball"></i>Date of Birth</li>
                        <li><i class="far fa-calendar-alt"></i>The moment you joined</li>
                    </ul>
                </div>
                <div class="profile-follows">
                    <h4><span>0</span> following</h4>
                    <h4><span>0</span> followers</h4>
                </div>
            </div>
            
            <div class="tweet-list">
                <ul>
                    <li>Tweets</li>
                    <li>Tweets & replies</li>
                    <li>Media</li>
                    <li>Likes</li>
                </ul>
                @if (count($tweets) > 0)
                    @foreach ($tweets as $tweet)
                    <div class='tweet-card'>
                        <div class='picture'>
                            <img src={{ asset('img/pika.png', true) }}>
                        </div>
                        <div class='text'>
                            <div class='info'>
                                <h4>{{ Auth::user()->name }}</h4>
                            </div>
                                <div class='description'>{{ $tweet->tweet }}</div>
                            <div class='reaction'>
                                <i class='far fa-comment'></i>
                                <i class='fas fa-retweet'></i>
                                <i class='far fa-heart'></i>
                                <i class='fas fa-external-link-alt'></i>
                                <i class='far fa-chart-bar'></i>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    
    <div class="right">
         <div class="settings">
             <div class="title">
                <i class="fas fa-times settings-end"></i>
                <p>Settings</p>
             </div>

            <form method="POST" action="{{ url('/update') }}">  <!-- enctype="multipart/form-data" -->
                {{ csrf_field() }}
                <!--<details>-->
                <!--    <summary>Email</summary>-->
                <!--    <input type="text" name="email" value="">-->
                <!--</details>-->
                <!--<details>-->
                <!--    <summary>Password</summary>-->
                <!--    <input type="password" name="password" value="">-->
                <!--</details>-->
                <details>
                    <summary>Name</summary>
                    <input type="text" name="name" value="{{ Auth::user()->name }}">
                </details>
                <!--<details>-->
                <!--    <summary>Username</summary>-->
                <!--    <input type="text" name="username" value=">">-->
                <!--</details>-->
                <!--<details>-->
                <!--    <summary>Bio</summary>-->
                <!--    <textarea class="bio" name="bio" cols="32" rows="2"></textarea>-->
                <!--</details>-->
                <!--<details>-->
                <!--    <summary>Profile Picture</summary>-->
                <!--    <input type="file" name="profile_picture" accept="image/*">-->
                <!--</details>-->
                <!--<details>-->
                <!--    <summary>Background Image</summary>-->
                <!--    <input type="file" name="background_image" accept="image/*">-->
                <!--</details>-->
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <input type="submit" value="Update" class="submit">
            </form>
            <!--<ul>-->
            <!--    <li><a class="logout" href="logout.php">Log out</a></li>-->
            <!--    <li><a class="deactivate" href="">Deactivate</a></li>-->
            <!--</ul>-->
        </div>
    </div>



    <!-- バリデーションエラーの表示に使用-->
    @include('common.errors')
    <!-- バリデーションエラーの表示に使用-->
</div>
@endsection