from django.db import models

# Create your models here.

class Skicenter(models.Model):
    id = models.IntegerField(primary_key=True)  # AutoField?
    name = models.CharField(max_length=255)
    englishname = models.CharField(db_column='englishName', max_length=255)  # Field name made lowercase.
    snow_down = models.IntegerField(blank=True, null=True)
    snow_up = models.IntegerField(blank=True, null=True)
    temp = models.FloatField(blank=True, null=True)
    website = models.CharField(max_length=255, blank=True)
    weatherurl = models.CharField(max_length=255, blank=True)
    open = models.IntegerField(blank=True, null=True)

    def __unicode__(self):
        return self.name    

    class Meta:
        managed = False
        db_table = 'skicenter'
    

 #   name        = models.CharField(max_length=255, unique=True)
 #   englishName = models.CharField(max_length=255, unique=True)
 #   snow_down   = models.IntegerField(default=0)
 #   snow_up     = models.IntegerField(default=0)
 #   open        = models.IntegerField(default=0)
 #   temp        = models.DecimalField(max_digits=4, decimal_places=1, blank=True, null=True)
 #   weatherUrl  = models.CharField(max_length=255, unique=True)
 #   website     = models.CharField(max_length=255, unique=True)

