from django import forms
from rango.models import Skicenter

class SkiCenterForm(forms.ModelForm):
    open = forms.IntegerField(widget=forms.HiddenInput(), initial=0)
    snow_up = forms.IntegerField(widget=forms.HiddenInput(), initial=10)
    snow_down = forms.IntegerField(widget=forms.HiddenInput(), initial=10)

    # An inline class to provide additional information on the form.
    class Meta:
        # Provide an association between the ModelForm and a model
        model = Skicenter
        # What fields do we want to include in our form?
        # This way we don't need every field in the model present.
        # Some fields may allow NULL values, so we may not want to include them...
        # Here, we are hiding the foreign key.
        fields = ('open', 'snow_up', 'snow_down')
