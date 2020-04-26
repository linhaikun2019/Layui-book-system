<?php

/* table/tracking/create_version.twig */
class __TwigTemplate_2eacbec796e0108a75ca359b13a9ccc6afac807a07e92f86d2476905f5249cef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div id=\"div_create_version\">
    <form method=\"post\" action=\"";
        // line 2
        echo ($context["url_query"] ?? null);
        echo "\">
        ";
        // line 3
        echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
        echo "
        ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["selected"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["selected_table"]) {
            // line 5
            echo "            <input type=\"hidden\" name=\"selected[]\" value=\"";
            echo twig_escape_filter($this->env, $context["selected_table"], "html", null, true);
            echo "\">
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['selected_table'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "
        <fieldset>
            <legend>
                ";
        // line 10
        if ((twig_length_filter($this->env, ($context["selected"] ?? null)) == 1)) {
            // line 11
            echo "                    ";
            echo twig_escape_filter($this->env, sprintf(_gettext("Create version %1\$s of %2\$s"), (            // line 12
($context["last_version"] ?? null) + 1), ((            // line 13
($context["db"] ?? null) . ".") . $this->getAttribute(($context["selected"] ?? null), 0, [], "array"))), "html", null, true);
            // line 14
            echo "
                ";
        } else {
            // line 16
            echo "                    ";
            echo twig_escape_filter($this->env, sprintf(_gettext("Create version %1\$s"), (($context["last_version"] ?? null) + 1)), "html", null, true);
            echo "
                ";
        }
        // line 18
        echo "            </legend>
            <input type=\"hidden\" name=\"version\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, (($context["last_version"] ?? null) + 1), "html", null, true);
        echo "\">
            <p>";
        // line 20
        echo _gettext("Track these data definition statements:");
        echo "</p>

            ";
        // line 22
        if (((($context["type"] ?? null) == "both") || (($context["type"] ?? null) == "table"))) {
            // line 23
            echo "                <input type=\"checkbox\" name=\"alter_table\" value=\"true\"";
            // line 24
            echo ((twig_in_filter("ALTER TABLE", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
            echo ">
                ALTER TABLE<br/>
                <input type=\"checkbox\" name=\"rename_table\" value=\"true\"";
            // line 27
            echo ((twig_in_filter("RENAME TABLE", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
            echo ">
                RENAME TABLE<br/>
                <input type=\"checkbox\" name=\"create_table\" value=\"true\"";
            // line 30
            echo ((twig_in_filter("CREATE TABLE", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
            echo ">
                CREATE TABLE<br/>
                <input type=\"checkbox\" name=\"drop_table\" value=\"true\"";
            // line 33
            echo ((twig_in_filter("DROP TABLE", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
            echo ">
                DROP TABLE<br/>
            ";
        }
        // line 36
        echo "            ";
        if ((($context["type"] ?? null) == "both")) {
            // line 37
            echo "                <br/>
            ";
        }
        // line 39
        echo "            ";
        if (((($context["type"] ?? null) == "both") || (($context["type"] ?? null) == "view"))) {
            // line 40
            echo "                <input type=\"checkbox\" name=\"alter_view\" value=\"true\"";
            // line 41
            echo ((twig_in_filter("ALTER VIEW", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
            echo ">
                ALTER VIEW<br/>
                <input type=\"checkbox\" name=\"create_view\" value=\"true\"";
            // line 44
            echo ((twig_in_filter("CREATE VIEW", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
            echo ">
                CREATE VIEW<br/>
                <input type=\"checkbox\" name=\"drop_view\" value=\"true\"";
            // line 47
            echo ((twig_in_filter("DROP VIEW", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
            echo ">
                DROP VIEW<br/>
            ";
        }
        // line 50
        echo "            <br/>

            <input type=\"checkbox\" name=\"create_index\" value=\"true\"";
        // line 53
        echo ((twig_in_filter("CREATE INDEX", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
        echo ">
            CREATE INDEX<br/>
            <input type=\"checkbox\" name=\"drop_index\" value=\"true\"";
        // line 56
        echo ((twig_in_filter("DROP INDEX", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
        echo ">
            DROP INDEX<br/>

            <p>";
        // line 59
        echo _gettext("Track these data manipulation statements:");
        echo "</p>
            <input type=\"checkbox\" name=\"insert\" value=\"true\"";
        // line 61
        echo ((twig_in_filter("INSERT", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
        echo ">
            INSERT<br/>
            <input type=\"checkbox\" name=\"update\" value=\"true\"";
        // line 64
        echo ((twig_in_filter("UPDATE", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
        echo ">
            UPDATE<br/>
            <input type=\"checkbox\" name=\"delete\" value=\"true\"";
        // line 67
        echo ((twig_in_filter("DELETE", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
        echo ">
            DELETE<br/>
            <input type=\"checkbox\" name=\"truncate\" value=\"true\"";
        // line 70
        echo ((twig_in_filter("TRUNCATE", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
        echo ">
            TRUNCATE<br/>
        </fieldset>

        <fieldset class=\"tblFooters\">
            <input type=\"hidden\" name=\"submit_create_version\" value=\"1\" />
            <input type=\"submit\" value=\"";
        // line 76
        echo _gettext("Create version");
        echo "\" />
        </fieldset>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "table/tracking/create_version.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 76,  164 => 70,  159 => 67,  154 => 64,  149 => 61,  145 => 59,  139 => 56,  134 => 53,  130 => 50,  124 => 47,  119 => 44,  114 => 41,  112 => 40,  109 => 39,  105 => 37,  102 => 36,  96 => 33,  91 => 30,  86 => 27,  81 => 24,  79 => 23,  77 => 22,  72 => 20,  68 => 19,  65 => 18,  59 => 16,  55 => 14,  53 => 13,  52 => 12,  50 => 11,  48 => 10,  43 => 7,  34 => 5,  30 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/tracking/create_version.twig", "D:\\phpstudy_pro\\WWW\\phpMyAdmin4.8.5\\templates\\table\\tracking\\create_version.twig");
    }
}
