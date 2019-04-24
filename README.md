# Sections for prices options

Section for prices options is a wordpress plugin.


It serves to generate a comparison between three variables of a product or service.


The user to see the prices and their characteristics, will tend to value the most expensive products as better.

Therefore, the probability of you acquiring a more expensive product with this plugin increases.

## Usage

Section for prices options or by its abbreviation "sfpo" works through a shortcode.

This short code is written like this:


[sfpo]


It should be noted that this is the most basic way of the shortcode, so that it is to our liking we will have to configure some parameters.

### How config sfpo?

To configure it we have to add a parameter named "values"

It is written inside the brackets, after sfpo with an equal (=) and quotes (")


[sfpo values ​​= ""]


Inside the quotes is written:


[sfpo values ​​= "Description1 | true | true | true; Description2 | false | true | true"]


The symbol "|" divides into columns (there are always three) and ";" moves to the next row (up to 30 rows can be written)

(true represents a tilde, false a cross can also be added text)


#### Rename sections

To change the name the parameters are used:

1st = "" to modify the first section
2nd = "" to modify the second section
3rd = "" to modify the third section
[sfpo 1st = "Section 1" 2nd = "Section 2" 3rd = "Section 3" values ​​= "Description1 | true | true | true; Description2 | false | true | true"]


#### Add buttons in sections

To add buttons you have to add extra values ​​to 1st, 2nd and 3rd:

[sfpo 1st = "Section 1; See more; https: //www.example.com" 2nd = "Section 2
; See more; https: //www.example.com "3rd =" Section 3
; See more; https: //www.example.com "values ​​=" Description1 | true | true | true; Description2 | false | true | true "]

The first new value is the text of the button and the second the link. They are separated with a semicolon ";"
