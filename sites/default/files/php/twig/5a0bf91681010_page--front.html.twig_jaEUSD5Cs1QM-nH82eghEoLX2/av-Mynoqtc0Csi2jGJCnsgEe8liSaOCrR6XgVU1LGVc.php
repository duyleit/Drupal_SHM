<?php

/* themes/jhvbt/templates/system/page--front.html.twig */
class __TwigTemplate_c5f58502d67404085ee19d50724b45705d7d33918cbceca9d79059bc627833b6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'navbar' => array($this, 'block_navbar'),
            'navbar_fixed' => array($this, 'block_navbar_fixed'),
            'main' => array($this, 'block_main'),
            'sidebar_first' => array($this, 'block_sidebar_first'),
            'content' => array($this, 'block_content'),
            'sidebar_second' => array($this, 'block_sidebar_second'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("set" => 59, "if" => 61, "block" => 62);
        $filters = array("clean_class" => 67, "t" => 79);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('set', 'if', 'block'),
                array('clean_class', 't'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 54
        echo "
<div class=\"container\">
  ";
        // line 56
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "top", array()), "html", null, true));
        echo "
</div>

";
        // line 59
        $context["container"] = (($this->getAttribute($this->getAttribute(($context["theme"] ?? null), "settings", array()), "fluid_container", array())) ? ("container-fluid") : ("container"));
        // line 61
        if (($this->getAttribute(($context["page"] ?? null), "navigation", array()) || $this->getAttribute(($context["page"] ?? null), "navigation_collapsible", array()))) {
            // line 62
            echo "  ";
            $this->displayBlock('navbar', $context, $blocks);
        }
        // line 99
        echo "

\t";
        // line 102
        echo "  ";
        if ($this->getAttribute(($context["page"] ?? null), "navbar_fixed", array())) {
            // line 103
            echo "     ";
            $this->displayBlock('navbar_fixed', $context, $blocks);
            // line 122
            echo "  ";
        }
        // line 123
        echo "


<div class='col-sm-12'>
</div>

";
        // line 130
        $this->displayBlock('main', $context, $blocks);
        // line 176
        echo " 



";
        // line 180
        if ($this->getAttribute(($context["page"] ?? null), "footer", array())) {
            // line 181
            echo "  ";
            $this->displayBlock('footer', $context, $blocks);
        }
    }

    // line 62
    public function block_navbar($context, array $blocks = array())
    {
        // line 63
        echo "    ";
        // line 64
        $context["navbar_classes"] = array(0 => "navbar", 1 => (($this->getAttribute($this->getAttribute(        // line 66
($context["theme"] ?? null), "settings", array()), "navbar_inverse", array())) ? ("navbar-inverse") : ("navbar-default")), 2 => (($this->getAttribute($this->getAttribute(        // line 67
($context["theme"] ?? null), "settings", array()), "navbar_position", array())) ? (("navbar-" . \Drupal\Component\Utility\Html::getClass($this->getAttribute($this->getAttribute(($context["theme"] ?? null), "settings", array()), "navbar_position", array())))) : (($context["container"] ?? null))));
        // line 70
        echo "    <header";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["navbar_attributes"] ?? null), "addClass", array(0 => ($context["navbar_classes"] ?? null), 1 => "container-fluid"), "method"), "removeClass", array(0 => "container"), "method"), "html", null, true));
        echo " id=\"navbar\" role=\"banner\">
      ";
        // line 71
        if ( !$this->getAttribute(($context["navbar_attributes"] ?? null), "hasClass", array(0 => ($context["container"] ?? null)), "method")) {
            // line 72
            echo "        <div class=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["container"] ?? null), "html", null, true));
            echo "\">
      ";
        }
        // line 74
        echo "      <div class=\"navbar-header\">
        ";
        // line 75
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "navigation", array()), "html", null, true));
        echo "
        ";
        // line 77
        echo "        ";
        if ($this->getAttribute(($context["page"] ?? null), "navigation_collapsible", array())) {
            // line 78
            echo "          <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#navbar-collapse\">
            <span class=\"sr-only\">";
            // line 79
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Toggle navigation")));
            echo "</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
        ";
        }
        // line 85
        echo "      </div>

      ";
        // line 88
        echo "      ";
        if ($this->getAttribute(($context["page"] ?? null), "navigation_collapsible", array())) {
            // line 89
            echo "        <div id=\"navbar-collapse\" class=\"navbar-collapse collapse\">
          ";
            // line 90
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "navigation_collapsible", array()), "html", null, true));
            echo "
        </div>
      ";
        }
        // line 93
        echo "      ";
        if ( !$this->getAttribute(($context["navbar_attributes"] ?? null), "hasClass", array(0 => ($context["container"] ?? null)), "method")) {
            // line 94
            echo "        </div>
      ";
        }
        // line 96
        echo "    </header>
  ";
    }

    // line 103
    public function block_navbar_fixed($context, array $blocks = array())
    {
        // line 104
        echo "\t\t\t<div class=\"s_nav\">
        <nav class=\"navbar navbar-default navbar-fixed-top\">
            <div class=\"container-fluid\">
                <div class=\"navbar-header\">
                    <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar3\">
                        <span class=\"sr-only\">Toggle navigation</span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </button>
                    <a class=\"navbar-brand\" href=\"http://192.168.11.200\"><img src=\"/themes/jhvbt/images/logo-big.png\" alt=\"Shimmer\">
                    </a>
                </div>
            ";
        // line 117
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "navbar_fixed", array()), "html", null, true));
        echo "   
            </div>
        </nav>
     </div>
\t ";
    }

    // line 130
    public function block_main($context, array $blocks = array())
    {
        // line 131
        echo "  <div role=\"main\" class=\"main-container ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["container"] ?? null), "html", null, true));
        echo " js-quickedit-main-content\">
   
    <div class=\"row\">
\t";
        // line 135
        echo "   <div class=\"col-sm-12\" role=\"heading\">
     <div class=\"region region-header\">
\t
      </div>
   </div>
   
   
      ";
        // line 143
        echo "      ";
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_first", array())) {
            // line 144
            echo "        ";
            $this->displayBlock('sidebar_first', $context, $blocks);
            // line 151
            echo "      ";
        }
        // line 152
        echo "\t
\t
\t";
        // line 155
        echo "     

        ";
        // line 158
        echo "        ";
        $this->displayBlock('content', $context, $blocks);
        // line 163
        echo "\t  
\t 
\t
      ";
        // line 167
        echo "      ";
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_second", array())) {
            // line 168
            echo "        ";
            $this->displayBlock('sidebar_second', $context, $blocks);
            // line 173
            echo "      ";
        }
        // line 174
        echo "    </div>
  </div>
";
    }

    // line 144
    public function block_sidebar_first($context, array $blocks = array())
    {
        // line 145
        echo "          <aside class=\"col-md-2 col-sm-3\" role=\"complementary\">
            ";
        // line 146
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "sidebar_first", array()), "html", null, true));
        echo "
\t\t\t";
        // line 148
        echo "\t
          </aside>
        ";
    }

    // line 158
    public function block_content($context, array $blocks = array())
    {
        // line 159
        echo "         
\t\t  <div class='col-md-10 col-sm-9'>
\t\t        ";
        // line 161
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "content", array()), "html", null, true));
        echo "
\t\t  </div>
        ";
    }

    // line 168
    public function block_sidebar_second($context, array $blocks = array())
    {
        // line 169
        echo "          <aside class=\"col-sm-3\" role=\"complementary\">
            ";
        // line 170
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "sidebar_second", array()), "html", null, true));
        echo "
          </aside>
        ";
    }

    // line 181
    public function block_footer($context, array $blocks = array())
    {
        // line 182
        echo "    <footer class=\"footer ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["container"] ?? null), "html", null, true));
        echo "-fliud\" role=\"contentinfo\">
\t      ";
        // line 183
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "footer", array()), "html", null, true));
        echo "
    </footer>
  ";
    }

    public function getTemplateName()
    {
        return "themes/jhvbt/templates/system/page--front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  314 => 183,  309 => 182,  306 => 181,  299 => 170,  296 => 169,  293 => 168,  286 => 161,  282 => 159,  279 => 158,  273 => 148,  269 => 146,  266 => 145,  263 => 144,  257 => 174,  254 => 173,  251 => 168,  248 => 167,  243 => 163,  240 => 158,  236 => 155,  232 => 152,  229 => 151,  226 => 144,  223 => 143,  214 => 135,  207 => 131,  204 => 130,  195 => 117,  180 => 104,  177 => 103,  172 => 96,  168 => 94,  165 => 93,  159 => 90,  156 => 89,  153 => 88,  149 => 85,  140 => 79,  137 => 78,  134 => 77,  130 => 75,  127 => 74,  121 => 72,  119 => 71,  114 => 70,  112 => 67,  111 => 66,  110 => 64,  108 => 63,  105 => 62,  99 => 181,  97 => 180,  91 => 176,  89 => 130,  81 => 123,  78 => 122,  75 => 103,  72 => 102,  68 => 99,  64 => 62,  62 => 61,  60 => 59,  54 => 56,  50 => 54,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/jhvbt/templates/system/page--front.html.twig", "C:\\xampp\\htdocs\\drupal8\\themes\\jhvbt\\templates\\system\\page--front.html.twig");
    }
}
