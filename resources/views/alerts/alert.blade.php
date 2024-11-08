@if(session('success'))
    <div id="notification" class="notification">
        <button id="close-notification" class="close-btn">&times;</button>
        <p class="notification-message">{{ session('success') }}</p>
        <div id="time-bar" class="time-bar"></div>
    </div>
@endif

@if(session('status'))
    <div id="notification" class="notification">
        <button id="close-notification" class="close-btn">&times;</button>
        <p class="notification-message">{{ session('status') }}</p>
        <div id="time-bar" class="time-bar"></div>
    </div>
@endif