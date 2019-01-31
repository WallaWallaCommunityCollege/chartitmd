using System;
using System.Collections.Generic;
using System.Text;

namespace ChartMD.Models
{
    public class MeasuredValue
    {
        public Int64 MeasuredValueId { get; set; }
        public string Type { get; set; }
        public Decimal Value { get; set; }
        public string Unit { get; set; }
        public DateTime TimeStamp { get; set; }
        public Int64 MeasurerID { get; set; }
        public string MySQL_Field { get; set; }
    }
}
