# Highlight ![Statamic v1](https://img.shields.io/badge/statamic-v1-lightgrey.svg?style=flat-square)

Highlight words on the current page based on a variable in the URL.

## Usage

This is a modifier that will work with any text string.

```
{{ content|highlight }}
```

## Installing & Setup

Highlight requires Statamic v1.7.0 or later.

1. Drag `_add-ons/highlight` into your site's `_add-ons` folder
2. Drag `_config/add-ons/highlight` into your site's `_config/add-ons` folder
3. Configure `_config/add-ons/highlight/highlight.yaml` as desired


## Settings

- `get_variable` is the variable to look for in the URL, `mark` by default; if more than one word is specified (separated by spaces), each will be marked individually
- `wrapping_element_start` is what will be placed immediately before each match
- `wrapping_element_end` is what will be placed immediately after each match


## Integrating with Bloodhound

You'll need to update your result links to have your `get_variable` and the given `{{ _query }}` appended to each `{{ url }}` within your `{{ bloodhound:search }}` tags, like this:

```
{{ url }}?mark={{ _query }}
```

This will pass the made query along in the `mark` variable.
You can configure `get_variable` to look for anything you want.
If you change that, be sure to use the correct variable in your URLs.
