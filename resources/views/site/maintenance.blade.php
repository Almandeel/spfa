<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
        @import url(http://fonts.googleapis.com/css?family=Roboto);
    *
    {
        font-family: 'Roboto' , sans-serif;
    }
    /* body
    {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMC8yOS8xMiKqq3kAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAABHklEQVRIib2Vyw6EIAxFW5idr///Qx9sfG3pLEyJ3tAwi5EmBqRo7vHawiEEERHS6x7MTMxMVv6+z3tPMUYSkfTM/R0fEaG2bbMv+Gc4nZzn+dN4HAcREa3r+hi3bcuu68jLskhVIlW073tWaYlQ9+F9IpqmSfq+fwskhdO/AwmUTJXrOuaRQNeRkOd5lq7rXmS5InmERKoER/QMvUAPlZDHcZRhGN4CSeGY+aHMqgcks5RrHv/eeh455x5KrMq2yHQdibDO6ncG/KZWL7M8xDyS1/MIO0NJqdULLS81X6/X6aR0nqBSJcPeZnlZrzN477NKURn2Nus8sjzmEII0TfMiyxUuxphVWjpJkbx0btUnshRihVv70Bv8ItXq6Asoi/ZiCbU6YgAAAABJRU5ErkJggg==);
    }  */
    .page {
        margin-top:15%;
    }
    .error-template
    {
        padding: 40px 15px;
        text-align: center;
    }
    .error-actions
    {
        margin-top: 15px;
        margin-bottom: 15px;
    }
    .error-actions .btn
    {
        margin-right: 10px;
    }
    .message-box h1
    {
        color: #252932;
        font-size: 98px;
        font-weight: 700;
        line-height: 98px;
        text-shadow: rgba(61, 61, 61, 0.3) 1px 1px, rgba(61, 61, 61, 0.2) 2px 2px, rgba(61, 61, 61, 0.3) 3px 3px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="page">
            <div class="col-md-6">
                <div class="error-template">
                    <h1>
                        :) Oops!</h1>
                    <h2>
                        Temporarily down for maintenance</h2>
                    <h1>
                        We’ll be back soon!</h1>
                    <div>
                        <p>
                            {{ $setting->maintenance_message }}
                        </p>
                        <p>
                            — The Team
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img  src="{{  asset('images/settings/' . $setting->site_logo) }}" alt="">
            </div>
        </div>
    </div>
</div>