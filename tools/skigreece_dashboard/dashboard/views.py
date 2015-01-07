from django.shortcuts import render
# Import the models
from dashboard.models import Skicenter

# Create your views here.

from django.http import HttpResponse
from django.template import RequestContext
from django.shortcuts import render_to_response

#def index(request) :
#   return HttpResponse("Welcome to dashboard main page. Go to <a href = '/dashboard/about'> About page </a>") 

def index(request):
    # Request the context of the request.
    # The context contains information such as the client's machine details, for example.
    context = RequestContext(request)

    # Query the database for a list of ALL categories currently stored.
    # Order the categories by no. likes in descending order.
    # Retrieve the top 5 only - or all if less than 5.
    # Place the list in our context_dict dictionary which will be passed to the template engine.
    skicenter_list = Skicenter.objects.order_by('id')
    context_dict = {'skicenters': skicenter_list}

    # Return a rendered response to send to the client.
    # We make use of the shortcut function to make our lives easier.
    # Note that the first parameter is the template we wish to use.
    return render_to_response('dashboard/index.html', context_dict, context)

def about(request) :
   return HttpResponse("This is the about page. Return to <a href='/dashboard'> Main </a>") 
